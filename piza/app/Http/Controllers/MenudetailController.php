<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MenudetailController extends Controller
{

    public function index(Request $request)
    {

    $id = $request->get('id');
    $it = DB::table('product')->where('PRO_ID',$id)->first();
    $itm = DB::table('price')->where('PRO_ID',$id)->where('SIZE_ID',1)->first();
    $itl = DB::table('price')->where('PRO_ID',$id)->where('SIZE_ID',2)->first();
    $itf = DB::table('price')->where('PRO_ID',$id)->where('SIZE_ID',3)->first();
    $al = DB::table('allergy')
        ->join('allergdetail','allergy.ALLE_ID','=','allergdetail.ALLE_ID')
        ->select('allergdetail.ALLE_WHEAT')
        ->where('PRO_ID',$id)->get();

    return view('menu_detail',compact('it','itm','itl','itf','al'));

    }
}
