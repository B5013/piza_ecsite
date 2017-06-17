<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class uriageController extends Controller
{
    public function index()
    {
        return view('/admin/k_uriage');
    }
    
    public function toukei(Request $request)
    {
        $gen = $request->get('gen');
    $or = $request->get('or');
    $time = $request->get('time');
    $now = Carbon::now();
    if($gen == 0){
        $to = DB::table('saledetail')
        ->join('product','saledetail.PRO_ID','=','product.PRO_ID')
        ->join('size','saledetail.SIZE_ID','=','size.SIZE_ID')
        ->join('price',function($join){
            $join->on('saledetail.PRO_ID','=','price.PRO_ID')
            ->on('saledetail.SIZE_ID','price.SIZE_ID');
        })
         ->join('sale','saledetail.SALE_ID','=','sale.SALE_ID')
        ->select('product.PRO_ID','product.PRO_NAME','size.SIZE_SIZE',DB::raw('SUM(saledetail.SAL) as sal'),DB::raw('SUM(price.PRICE_PRICE) as price'))
        ->whereBetween('sale.SALE_DAT',[$time,$now])
        ->groupBy('product.PRO_ID','product.PRO_NAME','size.SIZE_SIZE')
        ->orderBy('price',$or)
        ->get();
    }else{
     $to = DB::table('saledetail')
        ->join('product','saledetail.PRO_ID','=','product.PRO_ID')
        ->join('size','saledetail.SIZE_ID','=','size.SIZE_ID')
        ->join('price',function($join){
            $join->on('saledetail.PRO_ID','=','price.PRO_ID')
            ->on('saledetail.SIZE_ID','price.SIZE_ID');
        })
         ->join('sale','saledetail.SALE_ID','=','sale.SALE_ID')
        ->select('product.PRO_NAME','size.SIZE_SIZE',DB::raw('SUM(saledetail.SAL) as sal'),DB::raw('SUM(price.PRICE_PRICE) as price'))
         ->where('product.GEN_ID',$gen)
          ->whereBetween('sale.SALE_DAT',[$time,$now])
        ->groupBy('product.PRO_NAME','size.SIZE_SIZE')
        ->orderBy('price',$or)
        ->get();
    }
    return view('/admin/k_toukei',[
        "to" => $to,"time" => $time
    ]);
    }
}