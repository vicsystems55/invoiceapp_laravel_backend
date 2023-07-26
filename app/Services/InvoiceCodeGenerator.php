<?php 

namespace App\Services;


interface InvoiceCodeGenerator 
{

    public function generate(): string;

}