<?php

namespace App\Http\Controllers\API\v1;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;

class InvoiceController extends Controller
{
    /**

     *
     * @return \Illuminate\Http\Response
     */
    public function exportPDF()
    {
        //

        // return 1234;

        $pdf = Pdf::loadView('pdf.invoice');
        // compact('data','user', 'logo', 'css_file' )
        // )->setPaper('a4', 'portrait');



        $stored = Storage::put('public/generated_invoices/232323.pdf', $pdf->output());

        $pdftoimg = new \Spatie\PdfToImage\Pdf(url('public/generated_invoices/232323.pdf'));

        $pdftoimg->saveImage('converted/');


        // return $pdf->download('invoice.pdf');

    }

    /**
     * @bodyParam invoice_code string required A generated invoice string from frontend. Example: 90909080809
     * @bodyParam type string required
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceRequest $request)
    {
        //

        if ($request->type == 'initialize') {
            # code...

            $genratedInvoice = Invoice::updateOrCreate([
                'user_id' => $request->user()->id,
                'invoice_code' => $request->invoice_code
            ],[
                'user_id' => $request->user()->id,
                'invoice_code' => $request->invoice_code
            ]);

            return $genratedInvoice;
        }


    }

    /**
     * Initialize an invoice
     *
     * @header Authorization Bearer
     * @bodyParam invoice_code string required A generated invoice string from frontend. Example: 90909080809
     * @bodyParam type string required
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function initializeInvoice(StoreInvoiceRequest $request)
    {
        //

        if ($request->type == 'initialize') {
            # code...

            $genratedInvoice = Invoice::updateOrCreate([
                'user_id' => $request->user()->id,
                'invoice_code' => $request->invoice_code
            ],[
                'user_id' => $request->user()->id,
                'invoice_code' => $request->invoice_code
            ]);

            return $genratedInvoice;
        }


    }




    /**

     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**

     *
     * @param  \App\Http\Requests\UpdateInvoiceRequest  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**

     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
