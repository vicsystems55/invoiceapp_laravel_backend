<?php

namespace App\Http\Controllers\API\v1;
use App\Http\Controllers\Controller;

use App\Models\InvoiceTemplate;
use App\Http\Requests\StoreInvoiceTemplateRequest;
use App\Http\Requests\UpdateInvoiceTemplateRequest;

class InvoiceTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvoiceTemplateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceTemplateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceTemplate  $invoiceTemplate
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceTemplate $invoiceTemplate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceTemplateRequest  $request
     * @param  \App\Models\InvoiceTemplate  $invoiceTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceTemplateRequest $request, InvoiceTemplate $invoiceTemplate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoiceTemplate  $invoiceTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceTemplate $invoiceTemplate)
    {
        //
    }
}
