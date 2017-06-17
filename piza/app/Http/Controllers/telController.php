<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class telController extends Controller
{
    public function index()
    {
        $items = session()->get("items",[]); //セッションデータを取得、nullの場合は空の配列
    $as = session()->get("as",[]); //個数
    $bs = session()->get("bs",[]); //サイズ
    $cs = session()->get("cs",[]); //金額
    return view("/admin/k_tel", [ //データを渡してビューを表示
        "items" => $items, "as" => $as, "bs"=> $bs, "cs" => $cs
    ]);
    }
    
    public function add(Request $request)
    {
        $id = $request->get("id"); //idを取得
     $num = $request->get("num");
    $sid = $request->get("sid");
    $tcart = new \App\Service\pizakanriService();
    $tcart->addItem($id,$num,$sid);
     return redirect("/k_tel"); //カートのページへリダイレクト
    }
    
    public function delete(Request $request)
    {
        $index = $request->get("index"); //削除した商品のindexを取得
    $tcart = new \App\Service\pizakanriService();
    $tcart->removeItem($index);
    return redirect("/k_tel");
    }
    
    public function clear()
    {
        $tcart = new \App\Service\pizakanriService();
    $tcart->clear();
    return redirect("/k_tel"); //カートのページへリダイレクト
    }
    
    public function insert(Request $request)
    {
        $cid = $request->get('cid');
    $tel = $request->get('tel');
    $name = $request->get('name');
    $jyuusyo = $request->get('jyuusyo');
    $eid = $request->get('eid');
    $time = $request->get('time');
     $items2 = session()->get("items2",[]); //セッションデータを取得、nullの場合は空の配列
    $as = session()->get("as",[]);
    $bs2 = session()->get("bs2",[]);
    $now = Carbon::now();
    if($cid == 0){
        $uniqid = uniqid("")."@email.com";
        $unpw = md5(uniqid(rand(),1));
      $ccid = DB::table('users')->insertGetId(['name'=>$name,'KANA'=>"",
                                               'TEL'=>$tel,'email'=>$uniqid, 'password'=>$unpw,'remember_token'=>"",
                                               'created_at'=>$now,'updated_at'=>$now,'ADDN'=>"",'ADD'=>$jyuusyo,'black'=>'0']);  
    }else{
        $ccid = $cid;
    }
    $id = DB::table('sale')->insertGetId(['SALE_DAT'=>$now,'CL_ID'=>$ccid,
                  'EMP_ID'=>$eid,'SALE_PLANDAT'=>$time,'SALE_PLANDST'=>$jyuusyo,
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
     $tcart = new \App\Service\pizakanriService();
    $tcart->clear();
    return redirect("/k_tel");
    }
    
    public function kup(Request $request)
    {
        $index = $request->get('index');
    $kosu = $request->get('kosu');
    $tcart = new \App\Service\pizakanriService();
    $tcart->kup($index,$kosu);
    return redirect("/k_tel");
    }
    
    public function shosai()
    {
        $items = session()->get("items",[]); //セッションデータを取得、nullの場合は空の配列
    $as = session()->get("as",[]); //個数
    $bs = session()->get("bs",[]); //サイズ
    $cs = session()->get("cs",[]); //金額
    $ces = session()->get("ces",[]);
    $ces2 = session()->get("ces2",[]);
    return view("/admin/k_tshosai", [ //データを渡してビューを表示
        "items" => $items, "as" => $as, "bs"=> $bs, "cs" => $cs, "ces"=>$ces,"ces2"=>$ces2
    ]);
    }
    
    public function kensaku(Request $request)
    {
        $tel = $request->get('tel');
    $tcart = new \App\Service\pizakanriService();
    $tcart->client($tel);
    return redirect('/k_tshosai');
    }
}