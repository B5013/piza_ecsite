<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Client extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Client', function (Blueprint $table) {
            //顧客ID
            $table->increments('CL_ID');
            //顧客名
            $table->string('CL_NAME');
            //フリガナ
            $table->string('CL_KANA');
            //電話番号
            $table->string('CL_TEL');
            //メールアドレス
            $table->string('CL_MAIL')->unique();
            //パスワード
            $table->string('CL_PW');
            //郵便番号
            $table->string('CL_ADDN');
            //住所
            $table->string('CL_ADD');
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
        Schema::dropIfExists('Client');
    }
}
