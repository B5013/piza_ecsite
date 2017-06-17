<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Price extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Price', function (Blueprint $table){
            $table->increments('PRICE_ID'); //価格ID
            //商品ID
            $table->integer('PRO_ID');
            $table->integer('SALP_ID'); //販売期間ID
             //サイズID
            $table->integer('SIZE_ID');
            $table->string('PRICE_PRICE'); //価格
            
            
            
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
        Schema::dropIfExists('Price');
    }
}
