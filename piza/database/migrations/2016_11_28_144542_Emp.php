<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Emp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Emp', function (Blueprint $table) {
            //従業員ID
            $table->increments('EMP_ID');
            //従業員名
            $table->string('EMP_NAME');
            //店長
            $table->string('EMP_MASTER');
            //パスワード
            $table->string('EMP_PASS');
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
        Schema::dropIfExists('Emp');
    }
}
