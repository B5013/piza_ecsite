<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Shohins1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Product', function (Blueprint $table){
            //商品ID
            $table->increments('PRO_ID');
            //商品名
            $table->string('PRO_NAME'); 
            //ジャンルID
            $table->integer('GEN_ID');
            //コメント
            $table->string('PRO_COMMENT');    
            //画像
            $table->string('img');
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
        Schema::dropIfExists('Product');
    }
}
