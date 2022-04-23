<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_request', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Purchase_request_name');
            $table->string('Vendor_name');
            $table->string('Notes');
            $table->date('Create_date');
            $table->date('Order_date');
            $table->string('Product_name');
            $table->string('Description');
            $table->string('Unit_of_measure');
            $table->string('Quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_request');
    }
}
