<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class zyutyuuController extends Controller
{
    public function index()
    {
        $sale = DB::table('sale')
        ->orderBy('SALE_CHECK','asc')
        ->get();
    return view('admin/k_zyutyuu',[
        "sale"=>$sale
    ]);
    }
    
    public function check(Request $request)
    {
        $id = $request->get('id');
    $check = $request->get('check');
    DB::table('sale')->where('SALE_ID',$id)->update([
        'SALE_CHECK'=>1
    ]);
    return redirect('/k_zyutyuu');
    }
    
    public function shosai(Request $request)
    {
        $id = $request->get('id');
    $sale = DB::table('sale')->where('SALE_ID',$id)->first();
    $jyu = DB::table('admins')->where('id',"{$sale->EMP_ID}")->first();
    $shosai = DB::table('saledetail')
        ->join('product','saledetail.PRO_ID','=','product.PRO_ID')
        ->join('size','saledetail.SIZE_ID','=','size.SIZE_ID')
        ->join('price',function($join){
            $join->on('saledetail.PRO_ID','=','price.PRO_ID')
            ->on('saledetail.SIZE_ID','price.SIZE_ID');
        })
        ->select('saledetail.SALE_ID','product.PRO_NAME','size.SIZE_SIZE','saledetail.SAL','price.PRICE_PRICE')
        ->where('saledetail.SALE_ID',$id)
        ->get();
    return view('admin/k_zshosai',[
        "sale" => $sale,"shosai"=>$shosai,"jyu"=>$jyu
    ]);
    }
    
    public function hensyu(Request $request)
    {
        $id = $request->get('id');
    $sale = DB::table('sale')->where('SALE_ID',$id)->first();
    $jyu = DB::table('admins')->where('id',"{$sale->EMP_ID}")->first();
    $shosai = DB::table('saledetail')
        ->join('product','saledetail.PRO_ID','=','product.PRO_ID')
        ->join('size','saledetail.SIZE_ID','=','size.SIZE_ID')
        ->join('price',function($join){
            $join->on('saledetail.PRO_ID','=','price.PRO_ID')
            ->on('saledetail.SIZE_ID','price.SIZE_ID');
        })
        ->select('saledetail.SALEDT_ID','saledetail.SALE_ID','product.PRO_NAME','size.SIZE_SIZE','saledetail.SAL','price.PRICE_PRICE')
        ->where('saledetail.SALE_ID',$id)
        ->get();
    return view('admin/k_zhensyu',[
        "sale" => $sale,"shosai"=>$shosai,"jyu"=>$jyu
    ]);
    }
    
    public function kup(Request $request)
    {
           $id = $request->get('id');
    $sal = $request->get('sal');
    DB::table('saledetail')->where('SALEDT_ID',$id)
        ->update(["sal"=>$sal]);
    return redirect('/k_zyutyuu');
    }
    
    public function delete(Request $request)
    {
        $id = $request->get('id');
    DB::table('saledetail')->where('SALEDT_ID',$id)->delete();
    return redirect('/k_zyutyuu');
    }
}