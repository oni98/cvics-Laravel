<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Quotation;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuotationController extends Controller
{
    public function index($id){
        $quotations = Quotation::where('applicant_id', $id)->get();
        $application = Application::find($id);
        return view('backend.application_quotation.index', ['quotations' => $quotations, 'applicant' => $application]);
    }

    public function store(Request $request, $id){
        // dd($request, $id);

        $application = Application::find($id);

        $data = [
            'applicant' => $application,
            'invoice' => $request,
            'invoiceItems' => $request->invoiceItems
        ];

        $pdf = PDF::loadView('pdf.quotation', $data);
        $quotation = new Quotation();
        $quotation->applicant_id = $id;

        Storage::put('public/applications/' . $application->code .'/'. time(). '-Quotation.pdf', $pdf->output());
        $quotation->quotation_pdf = time(). '-Quotation.pdf';
        $quotation->save();

        return $pdf->download($application->code.'-Quotation.pdf');
    }
}
