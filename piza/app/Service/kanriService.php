<?php
namespace App\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
/**
 * カートの中身を保持するクラス
 */
class kanriService
{   
    public function getItems(){
         $kanri = DB::table('vegetables')
        ->where('top','<>','top')
        ->orderby('id','desc')
        ->get();
        return $kanri;
    }
    public function add($date){
        
    $name = $request->get('name');
    $kana = $request->get('kana');
    $img = 'images/'.$request->get('img');
    $price = $request->get('price');
    $now = Carbon::now();
    DB::table('vegetables')->insert( ['name'=>$name,'kana'=>$kana,'top'=>"",'img'=>$img,
                                      'price'=>$price,'created_at'=>$now,'updated_at'=>$now]                      
    );
    }
    
}