<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class clientController extends Controller
{
    public function index()
    {
        $kazu = 0;
    $cl = DB::table('users')->get();
    return view('admin/k_kokyaku',[
        "cl" => $cl,"kazu"=>$kazu
    ]);
    }
    
    public function shosai(Request $request)
    {
        $id = $request->get('id');
    $cl = DB::table('users')->where('id',$id)->first();
    $sale = DB::table('sale')->where('CL_ID',$id)->get();
    $krireki = DB::table('saledetail')
        ->join('product','saledetail.PRO_ID','=','product.PRO_ID')
        ->join('size','saledetail.SIZE_ID','=','size.SIZE_ID')
        ->join('price',function($join){
            $join->on('saledetail.PRO_ID','=','price.PRO_ID')
            ->on('saledetail.SIZE_ID','price.SIZE_ID');
        })
        ->join('sale','saledetail.SALE_ID','=','sale.SALE_ID')
        ->select('sale.CL_ID','saledetail.SALE_ID','sale.SALE_DAT','product.PRO_NAME','size.SIZE_SIZE','saledetail.SAL','price.PRICE_PRICE')
        ->where('sale.CL_ID',$id)
        ->get();
    return view('admin/k_kshosai',[
        "cl" => $cl,"krireki"=> $krireki,"sale"=>$sale
    ]);
    }
    
    public function kensaku(Request $request)
    {
        $kazu = 1;
    $name = $request->get('name');
    if($name == null){
        $cl = DB::table('users')->where('id',0)->get();
    }else{
    $cl = DB::table('users')->where('name','like',"%{$name}%")->get();
    }
    return view('admin/k_kokyaku', [
        "cl" => $cl, "kazu"=>$kazu
    ]);
    }
}