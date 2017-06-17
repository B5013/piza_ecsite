<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tax extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Tax', function (Blueprint $table) {
            //消費税ID
            $table->increments('TAX_ID');
            //消費税
            $table->string('TAX_TAX');
            //開始日
            $table->datetime('TAX_START');
            //終了日
            $table->datetime('TAX_END');
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
        Schema::dropIfExists('Tax');
    }
}
