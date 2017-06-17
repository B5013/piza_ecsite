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
            $table->datetime('SALP_START'); //開始日
            $table->datetime('SALP_END'); //終了日
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
