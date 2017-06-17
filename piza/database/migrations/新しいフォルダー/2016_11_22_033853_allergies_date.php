<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllergiesDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('AllergDetail', function (Blueprint $table){
            $table->text('ALLE_ID'); //アレルギーID
            $table->string('ALLED_WHEAT'); //アレルギー名
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
        Schema::dropIfExists('AllergDetail');
    }
}
