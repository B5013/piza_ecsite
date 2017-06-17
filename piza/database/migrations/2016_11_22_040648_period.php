<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Period extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('SalPeriod', function (Blueprint $table){
            $table->increments('SALP_ID'); //販売期間ID
            $table->date('SALP_START_DATE'); //開始日
            $table->time('SALP_START_TIME');
            $table->date('SALP_END_DATE'); //終了日
            $table->time('SALP_END_TIME');
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
        Schema::dropIfExists('SalPeriod');
    }
}
