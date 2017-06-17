<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //顧客ID
            $table->increments('id');
            //顧客名
            $table->string('name');
            //フリガナ
            $table->string('KANA');
            //電話番号
            $table->string('TEL');
            //メールアドレス
            $table->string('email')->unique();
            //パスワード
            $table->string('password');
            //郵便番号
            $table->string('ADDN');
            //住所
            $table->string('ADD');
            //ブラックリスト判断
            $table->string('black');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
