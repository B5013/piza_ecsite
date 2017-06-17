<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{


    public function index()
    {
      if (Auth::check()) {
      $items = session()->get("items",[]); //セッションデータを取得、nullの場合は空の配列
      $as = session()->get("as",[]); //個数
      $bs = session()->get("bs",[]); //サイズ
      $cs = session()->get("cs",[]); //金額
      }else{
          return redirect('/user/login');
      }
      return view('cart', compact('items','as','bs','cs'));

    }

    public function add(Request $request)
    {
      $id = $request->get("id"); //idを取得
      $num = $request->get("num");
      $sid = $request->get("sid");
      $tcart = new \App\Service\WebService();
      $tcart->addItem($id,$num,$sid);
      return redirect("cart"); //カートのページへリダイレクト

    }

    public function delete(Request $request)
    {
      $k = $request->input("k"); //削除した商品のindexを取得
      $cart = new \App\Service\WebService();
      $cart->removeItem($k);
      return redirect("/cart");

    }

    public function clear(){
      $cart = new \App\Service\WebService();
      $cart->clear();
      return redirect("/cart"); //カートのページへリダイレクト
    }

    public function insert(){
      $items2 = session()->get("items2",[]); //セッションデータを取得、nullの場合は空の配列
     $as = session()->get("as",[]);
     $bs2 = session()->get("bs2",[]);
     $now = Carbon::now();
     $id = DB::table('sale')->insertGetId(['SALE_DAT'=>$now,'CL_ID'=>$ccid,
                   'EMP_ID'=>"",'SALE_PLANDAT'=>$now,'SALE_PLANDST'=>'a',
                     'SALE_CANCEL'=>"",'SALE_PKACE'=>'電話注文',
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
     $cart = new \App\Service\WebService();
     $cart->clear();
     return redirect("/cart");

    }

    public function change(Request $request){
      $index = $request->get('index');
      $kosu = $request->get('kosu');
      $cart = new \App\Service\WebService();
      $cart->kup($index,$kosu);
      return redirect("/cart");
    }


}
