<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_tabel', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('Vendor_id');
            $table->integer('Phone_Number');
            $table->string('Vendor_name');
            $table->string('Address');
            $table->string('Email');
            $table->string('Notes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_tabel');
    }
}
