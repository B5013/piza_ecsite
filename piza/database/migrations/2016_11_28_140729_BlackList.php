<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlackList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('BlackList', function (Blueprint $table) {
            $table->increments('BL_ID');
            //顧客ID
            $table->integer('CL_ID');
            //内容
            $table->string('BL_Date');
            //従業員ID
            $table->integer('EMP_ID');
            ///登録日
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
        //
        Schema::dropIfExists('BlackList');
    }
}
