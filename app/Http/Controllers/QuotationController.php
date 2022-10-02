<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Quotation;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuotationController extends Controller
{
    public function index($id)
    {
        $quotations = Quotation::where('applicant_id', $id)->get();
        $application = Application::find($id);
        return view('backend.application_quotation.index', ['quotations' => $quotations, 'applicant' => $application]);
    }

    public function store(Request $request, $id)
    {
        $quotation = new Quotation();
        $quotation->applicant_id = $id;

        $application = Application::find($id);
        $data = [
            'applicant' => $application,
            'invoice' => $request,
            'invoiceItems' => $request->invoiceItems
        ];
        $pdf = PDF::loadView('pdf.quotation', $data);
        $quotation->quotation_pdf = time() . '-Quotation.pdf';
        Storage::put('public/applications/' . $application->code . '/' . $quotation->quotation_pdf, $pdf->output());
        
        $quotation->save();

        return $pdf->download($application->code . '-Quotation.pdf');
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
