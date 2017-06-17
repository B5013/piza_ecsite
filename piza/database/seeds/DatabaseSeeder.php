<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        
        //商品データ
        DB::table('allergdetail')->truncate();
        
        $all =[
            "ALLE_WHEAT" =>"なし"
        ];
        
        $all1 =[
            "ALLE_WHEAT" =>"小麦"
        ];
            
       $all2 =[
            "ALLE_WHEAT" =>"卵"
        ];
        
        $all3 =[
            "ALLE_WHEAT" =>"乳"
        ];
        
        $all4 =[
            "ALLE_WHEAT" =>"そば"
        ];
        
        $all5 =[
            "ALLE_WHEAT" =>"落花生"
        ];
        
        $all6 =[
            "ALLE_WHEAT" =>"エビ"
        ];
        
        $all7 =[
            "ALLE_WHEAT" =>"カニ"
        ];
        
        DB::table('allergdetail')->insert([$all,$all1,$all2,$all3,$all4,$all5,$all6,$all7]);
        
        DB::table('size')->truncate();
        $size1 =[
            "SIZE_SIZE" => "M"
        ];
        $size2 =[
            "SIZE_SIZE" => "L"
        ];
        $size3 =[
            "SIZE_SIZE" => "なし"
        ];
        
        DB::table('size')->insert([$size1,$size2,$size3]);
        
        DB::table('genre')->truncate();
        
        $genre1 =[
            "GEN_NAME" => "ピザ"
        ];
        $genre2 =[
            "GEN_NAME" => "ドリンク"
        ];
        $genre3 =[
            "GEN_NAME" => "サイドメニュー"
        ];
        
        DB::table('genre')->insert([$genre1,$genre2,$genre3]);
        
        DB::table('client')->truncate();
        $client1 =[
            "CL_NAME" => "佐藤俊哉",
            "CL_KANA" => "さとうとしや",
            "CL_TEL" => "090-1111-2222",
            "CL_MAIL" => "piza@mail.com",
            "CL_PW" => "password",
            "CL_ADDN" => "123-4567",
            "CL_ADD" => "東京都東京"
        ];
        
        DB::table('client')->insert([$client1]);
    
    }
}
