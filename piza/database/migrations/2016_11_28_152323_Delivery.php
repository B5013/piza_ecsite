<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Delivery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Delivery', function (Blueprint $table) {
            //配達ID
            $table->increments('DEL_ID');
            //配達日時
            $table->datetime('DEL_DAT');
            //従業員ID
            $table->integer('EMP_ID');
            //販売ID
            $table->integer('SALE_ID');
            //配達チェック
            $table->boolean('DEL_CHECK');
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
        Schema::dropIfExists('Delivery');
    }
}
