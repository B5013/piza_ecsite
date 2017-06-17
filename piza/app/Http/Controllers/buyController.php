<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;


class buyController extends Controller
{

    public function index()
    {
        return view('buy');

    }

    public function insert(Request $request)
    {
      $cid = $request->get('cid');
      $time = $request->get('time');
      $jyuusyo = $request->get('jyuusyo');
      $items2 = session()->get("items2",[]); //セッションデータを取得、nullの場合は空の配列
      $as = session()->get("as",[]);
      $bs2 = session()->get("bs2",[]);
      $now = Carbon::now();
      $id = DB::table('sale')->insertGetId(['SALE_DAT'=>$now,'CL_ID'=>$cid,
                    'EMP_ID'=>1,'SALE_PLANDAT'=>$time,'SALE_PLANDST'=>$jyuusyo,
                      'SALE_CANCEL'=>"",'SALE_PKACE'=>'Web注文',
                      'SALE_CHECK'=>0,"TAX_ID"=>1]);
      $k = 0;
      $k = count($items2);
      for($i = 0; $i < $k; $i++){
      if(empty($items2[$i])){
         $k++;
      }else{
            DB::table('saledetail')->insert([
          'SALE_ID'=>$id,'PRO_ID'=>$items2[$i],'SIZE_ID'=>$bs2[$i],'SAL'=>$as[$i]
      ]);
      }}
       $tcart = new \App\Service\WebService();
      $tcart->clear();
      return redirect("/buy");
    }

}
