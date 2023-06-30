<?php

namespace App\Http\Controllers\API\v1;
use App\Models\Invoice;

use App\Models\InvoiceItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceItemRequest;
use App\Http\Requests\UpdateInvoiceItemRequest;
use App\Models\BillableItem;

class InvoiceItemController extends Controller
{

    /**
     * Add an item to invoice
     *
     * @header Authorization Bearer

     * @bodyParam invoice_code string required A generated invoice string from frontend. Example: 90909080809
     * @bodyParam billable_item_id int required
     * @bodyParam qty integer required
     * @bodyParam price float
     *

     * @param  \App\Http\Requests\StoreInvoiceItemRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function appendToInvoice(StoreInvoiceItemRequest $request)
    {
        //

        $request->validate([
            'invoice_code' => 'required|exists:invoices,invoice_code'
        ]);

        $currentInvoice = Invoice::where('invoice_code', $request->invoice_code)->first();

        $billableItem = BillableItem::find($request->billable_item_id);

        $newInvoiceItem = InvoiceItem::updateOrCreate([
            'invoice_id' => $currentInvoice->id,
            'billable_item_id' => $request->billable_item_id,
        ],[
            'invoice_id' => $currentInvoice->id,
            'billable_item_id' => $request->billable_item_id,
            'price' => $request->price??$billableItem->price,
            'qty' => $request->qty,
            'total' => $request->price??$billableItem->price * $request->qty
        ]);

        $totalInvoiceSum = InvoiceItem::where('invoice_id', $currentInvoice->id)->get()->sum('total');
        $currentInvoice->update([
            'invoice_total' => $totalInvoiceSum
        ]);
        $invoiceUpdate = Invoice::with('invoiceItems')->find($currentInvoice->id);



        return $invoiceUpdate;




    }

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
     * Add a new invoiceable item.
     *
     * @param  \App\Http\Requests\StoreInvoiceItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceItem $invoiceItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceItemRequest  $request
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceItemRequest $request, InvoiceItem $invoiceItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceItem $invoiceItem)
    {
        //
    }
}
