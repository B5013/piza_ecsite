<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SaleDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('saledetail', function (Blueprint $table) {
            //販売詳細ID
            $table->increments('SALEDT_ID'); 
            //販売ID
            $table->integer('SALE_ID');
            //商品ID
            $table->integer('PRO_ID');
            //サイズID
            $table->integer('SIZE_ID');
            //個数
            $table->integer('SAL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('saledetail');
    }
}
