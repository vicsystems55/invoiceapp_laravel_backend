<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('invoice_code');
            $table->longText('invoice_note')->nullable();
            $table->decimal('invoice_total', 9,2)->default(0);
            $table->string('date')->nullable();
            $table->integer('discount')->default(0);
            $table->integer('vat')->default(0);
            $table->string('type')->default('invoice');
            $table->string('status')->default('unpaid');
            $table->foreignId('invoice_template_id')->nullable();
            $table->boolean('active')->default(1);

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
