<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->increments('billDetailID');
            $table->integer('billID');
            $table->integer('productID');
            $table->string('gamekey')->nullable(TRUE);
            $table->timestamps();
            $table->foreign('billID')
            ->references('billID')->on('bills')
            ->onDelete('cascade');
            $table->foreign('productID')
            ->references('productID')->on('products')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billdetails');
    }
}
