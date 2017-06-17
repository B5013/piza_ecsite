<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ShohinController extends Controller
{

    public function index()
    {
        $kazu = 0;
    $shohin = DB::table('product')->get();
    return view('admin/k_shohin', [
        "shohin" => $shohin, "kazu"=>$kazu
    ]);
    }
    
    public function tuika()
    {
        $all = DB::table('allergdetail')->get();
    return view('admin/k_stuika',[
        "all" => $all
    ]);
    }
    
    public function insert(Request $request)
    {
        $name = $request->get('name');
    $pricem = $request->get('pricem');
    $pricel = $request->get('pricel');
    $stime = $request->get('stime');
    $stime2 = $request->get('stime2');
    $etime = $request->get('etime');
    $etime2 = $request->get('etime2');
    $gen = $request->get('select');
    $img = "images/".$request->get('img');
    $com = $request->get('com');
    $now = Carbon::now();
    $id = DB::table('product')->insertGetId(['PRO_NAME'=>$name,'GEN_ID'=>$gen,
                                 'PRO_COMMENT'=>$com,'img'=>$img,'created_at'=>$now,
                                 'updated_at'=>$now]);
    $time = DB::table('salperiod')->insertGetId(['SALP_START_DATE'=>$stime,'SALP_START_TIME'=>$stime2,
                  'SALP_END_DATE'=>$etime,'SALP_END_TIME'=>$etime2]);
   if(empty($pricel) and $gen != 1){
        DB::table('price')->insert([
       ['PRO_ID'=>$id,'SALP_ID'=>$time,'SIZE_ID'=>3,'PRICE_PRICE'=>$pricem]
   ]);
   }elseif(empty($pricel)){
       DB::table('price')->insert([
       ['PRO_ID'=>$id,'SALP_ID'=>$time,'SIZE_ID'=>1,'PRICE_PRICE'=>$pricem]
   ]);
   }elseif(empty($pricem)){
       DB::table('price')->insert([
       ['PRO_ID'=>$id,'SALP_ID'=>$time,'SIZE_ID'=>2,'PRICE_PRICE'=>$pricel]
   ]);
   }else{
    DB::table('price')->insert([
       ['PRO_ID'=>$id,'SALP_ID'=>$time,'SIZE_ID'=>1,'PRICE_PRICE'=>$pricem],
       ['PRO_ID'=>$id,'SALP_ID'=>$time,'SIZE_ID'=>2,'PRICE_PRICE'=>$pricel]
   ]);}

    $all = $request->input('a');
    for($i = 0; $i < count($all); $i++){
             DB::table('allergy')->insert([
        'ALLE_ID'=>$all[$i],'PRO_ID'=>$id
        ]);
        }
    return redirect('/k_shohin');
    }
    
    public function hensyu(Request $request)
    {
        $id = $request->get("id");
    $shohin = DB::table('product')->where("PRO_ID",$id)->first();
    if("{$shohin->GEN_ID}" == 1){
    $shohin2 = DB::table('price')->where("PRO_ID",$id)
        ->where('SIZE_ID',1)->first();
    }else{
        $shohin2 = DB::table('price')->where("PRO_ID",$id)
        ->where('SIZE_ID',3)->first();
    }
    $shohin3 = DB::table('price')->where("PRO_ID",$id)
        ->where('SIZE_ID',2)->first();
    $shohin4 = DB::table('salperiod')->where("SALP_ID","{$shohin2->SALP_ID}")->first();
    $ss = DB::table('price')->select('SALP_ID')->where("PRICE_ID",$id)->first();
    $genre = DB::table('genre')->where("GEN_ID","{$shohin->GEN_ID}")->first();
    $all = DB::table('allergdetail')->get();
    $all2 = DB::table('allergy')->where('PRO_ID',$id)->get();
    return view('admin/k_shensyu', [
        "shohin" => $shohin, "shohin2" => $shohin2,"shohin3"=>$shohin3,
        "shohin4"=>$shohin4,"genre"=>$genre,"all" => $all,"all2"=>$all2
    ]);
    }
    
    public function update(Request $request)
    {
         $id = $request->get('id');
    $mid = $request->get('mid');
    $lid = $request->get('lid');
    $sid = $request->get('sid');
     $name = $request->get('name');
    $sidm = $request->get('sidm');
    $sidl = $request->get('sidl');
    $pricem = $request->get('pricem');
    $pricel = $request->get('pricel');
    $stime = $request->get('stime');
    $stime2 = $request->get('stime2');
    $etime = $request->get('etime');
    $etime2 = $request->get('etime2');
    $gen = $request->get('select');
    $im = $request->get('img');
    $img = "images/".$request->get('img');
    $com = $request->get('com');
    $now = Carbon::now(); 
    DB::table('product')->where('PRO_ID',$id)->update(['PRO_NAME'=>$name,'GEN_ID'=>$gen,'PRO_COMMENT'=>$com,'updated_at'=>$now]);
    if($im == null){
    }else{
        DB::table('product')->where('PRO_ID',$id)->update([
            'img'=>$img
        ]);
    }
    DB::table('salperiod')->where('SALP_ID',$sid)->update(['SALP_START_DATE'=>$stime,'SALP_START_TIME'=>$stime2,'SALP_END_DATE'=>$etime,'SALP_END_TIME'=>$etime2]);
   DB::table('price')->where('PRICE_ID',$mid)->update( ['PRICE_PRICE'=>$pricem]);
    DB::table('price')->where('PRICE_ID',$lid)->update(['PRICE_PRICE'=>$pricel]);
     DB::table('allergy')->where('PRO_ID',$id)->delete();
    $all = $request->input('a');
    for($i = 0; $i < count($all); $i++){
             DB::table('allergy')->insert([
        'ALLE_ID'=>$all[$i],'PRO_ID'=>$id
        ]);
        }
    return redirect('/k_shohin');
    }
    
    public function delete(Request $request)
    {
        $id = $request->get("id");
    $sid = DB::table('price')->where("PRO_ID",$id)->first();
    DB::table('product')->where('PRO_ID',$id)->delete();
    DB::table('price')->where('PRO_ID',$id)->delete();
    DB::table('allergy')->where('PRO_ID',$id)->delete();
    DB::table('salperiod')->where('SALP_ID',"{$sid->SALP_ID}")->delete();
    return redirect("/k_shohin");
    }
    
    public function kensaku(Request $request)
    {
        $kazu = 1;
    $name = $request->get('name');
     if($name == null){
        $shohin = DB::table('product')->where('PRO_ID',0)->get();
    }else{
    $shohin = DB::table('product')->where('PRO_NAME','like',"%{$name}%")->get();
     }
    return view('admin/k_shohin', [
        "shohin" => $shohin, "kazu"=>$kazu
    ]);
    }
}
