<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PizamenuController extends Controller
{

    public function index(Request $request)
    {

      $gen = $request->get('gen_id');
      $test = DB::table('product')->where('GEN_ID',$gen)->get();
      $test2 = DB::table('price')
          ->join('size','price.SIZE_ID','=','size.SIZE_ID')
          ->join('product','price.PRO_ID','=','product.PRO_ID')
          ->select('size.SIZE_SIZE','price.PRICE_PRICE','price.PRO_ID','price.SIZE_ID','product.GEN_ID')
          ->where('product.GEN_ID',$gen)->get();

        return view('pizamenu',compact('test','test2','gen'));
    }
}
