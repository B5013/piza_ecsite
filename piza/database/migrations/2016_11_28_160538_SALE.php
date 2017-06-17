<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SALE extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('SALE', function (Blueprint $table) {
            //販売ID
            $table->increments('SALE_ID');
            //販売日時
            $table->datetime('SALE_DAT');
            //顧客ID
            $table->integer('CL_ID');
            //従業員ID
            $table->integer('EMP_ID');
            //配達予定日時
            $table->datetime('SALE_PLANDAT');
            //配達予定先
            $table->string('SALE_PLANDST');
            //キャンセル
            $table->string('SALE_CANCEL');
            //注文受付場所
            $table->string('SALE_PKACE');
            //確認チェック
            $table->string('SALE_CHECK');
            //消費税ID
            $table->integer('TAX_ID');
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
        Schema::dropIfExists('SALE');
    }
}
