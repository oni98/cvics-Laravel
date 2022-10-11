<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use App\Models\Agent;
use App\Models\Quotation;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class QuotationController extends Controller
{
    public function index($id)
    {
        
        $quotations = Quotation::where([
            ['user_id','=', Auth::id()],
            ['applicant_id', '=', $id]
        ])->get();
        
        $application = Application::find($id);
        return view('backend.application_quotation.index', ['quotations' => $quotations, 'applicant' => $application, 'user_id'=>Auth::id()]);
    }

    public function store(Request $request, $id)
    {
        $application = Application::find($id); 
        $user = User::find($request->user_id); 
        $agent = Agent::find($user->agent_id);
        $data = [
            'applicant' => $application,
            'invoice' => $request,
            'invoiceItems' => $request->invoiceItems,
            'agent' => $agent
        ];

        
      
        if ($user->hasRole('admin')) {
            $pdf = PDF::loadView('pdf.quotation', $data);
        }
        else{
            $pdf = PDF::loadView('pdf.agentQuotation', $data);
        }
        
        $quotation = new Quotation();
        $quotation->applicant_id = $id;
        $quotation->user_id = $request->user_id;
        $quotation->quotation_pdf = time() . '-Quotation.pdf';
        Storage::put('public/applications/' . $application->code . '/' . $quotation->quotation_pdf, $pdf->output());
            
        if ($quotation->save()) {

            //  return response()->download(public_path('storage/applications/' . $application->code . '/' . $quotation->quotation_pdf));
            return response()->json(['file_name'=>'storage/applications/' . $application->code . '/' . $quotation->quotation_pdf]);
        }
    }

    public function destroy($id)
    {
        $quotation = Quotation::find($id);
        $application = Application::find($quotation->applicant_id);
        if (!is_null($quotation)) {
            if ($quotation->delete()) {
                if (file_exists(public_path('storage/applications/' . $application->code . '/' . $quotation->quotation_pdf))) {
                    unlink(public_path('storage/applications/' . $application->code . '/' . $quotation->quotation_pdf));
                }
                session()->flash('success', 'Quotation has been Deleted');
                return back();
            }
        }
    }
}
