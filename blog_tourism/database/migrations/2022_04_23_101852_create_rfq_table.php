<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfq', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Request_for_quotation_name');
            $table->string('Vendor_name');
            $table->string('Notes');
            $table->date('Create_date');
            $table->date('Order_date');
            $table->string('Product_name');
            $table->string('Description');
            $table->string('Unit_of_measure');
            $table->integer('Quantity');
            $table->integer('Price');
            $table->integer('Subtotal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rfq');
    }
}
