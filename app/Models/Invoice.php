<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function addItem(array $invoiceItemData): void
    {
        $invoiceItem = new InvoiceItem($invoiceItemData);

        $this->items()->save($invoiceItem);

        // update total
        $this->total += $invoiceItem->total;

    }

    public function removeItem(int $invoiceItemId): void
    {
        $invoiceItem = $this->items()->find($invoiceItemId);

        // update subtotal
        $this->total -= $invoiceItem->total;

        $invoiceItem->destroy();

    }

    public function applyDiscount(float $discount): void 
    {
        $this->discount = $discount;

        $this->total -= $discount;
    }

    public function applyTax(float $taxRate): void 
    {
        $this->vat = ($taxRate / 100) * $this->total;

        $this->total += $this->vat;
    }

}
