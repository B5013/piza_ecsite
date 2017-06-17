<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class OrderhistoryController extends Controller
{

    public function index(Request $request)
    {
      $id = $request->get('id');
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
    return view('orderhistory',compact("krireki","sale"));

    }
}
