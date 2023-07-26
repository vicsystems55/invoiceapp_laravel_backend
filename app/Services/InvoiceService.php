<?php

namespace App\Services;

use App\Models\Invoice;

class InvoiceService
{
    private $codeGnenrator;

    public function __construct(InvoiceCodeGenerator $codeGenerator)
    {
        $this->codeGnenrator = $codeGenerator;
    }

    public function createInvoice(array $invoiceData): Invoice 
    {
        $invoice = new Invoice($invoiceData);

        $invoice->invoice_code = $this->codeGnenrator->generate();

        $invoice->save();

        return $invoice;
    }

    public function addInvoiceItem(int $invoiceId, array $invoiceItemData): Invoice 
    {
        $invoice = Invoice::find($invoiceId);

        $invoice->addItem($invoiceItemData);

        $invoice->save();

        return $invoice;
    }

    public function removeInvoiceItem(int $invoiceId, int $invoiceItemId): Invoice 
    {
        $invoice = Invoice::find($invoiceId);

        $invoice->removeItem($invoiceItemId);

        $invoice->save();

        return $invoice;
    }

    public function updateInvoice(int $invoiceId, array $invoiceData): Invoice 
    {
        $invoice = Invoice::find($invoiceId);

        $invoice->customer_id = $invoiceData['customer_id'];
        $invoice->business_id = $invoiceData['business_id'];
        $invoice->note = $invoiceData['note'];
        $invoice->currency = $invoiceData['currency'];

        $invoice->due_date = $invoiceData['due_date'];

        $invoice->applyDiscount($invoiceData['discount']);

        $invoice->save();

        return $invoice;

    }

    public function deleteInvoice(int $invoiceId): void 
    {
        $invoice = Invoice::find($invoiceId);
        
        $invoice->destroy();
    }

}
