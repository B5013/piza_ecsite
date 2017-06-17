<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class haitatuController extends Controller
{
    public function index()
    {
       $del = DB::table('delivery')
    ->join('admins','delivery.EMP_ID','=','admins.id')
    ->select('delivery.DEL_ID','delivery.DEL_DAT','delivery.SALE_ID','delivery.DEL_CHECK','admins.name')
    ->orderBy('delivery.DEL_CHECK','asc')    
    ->get();
    return view('admin/k_haitatu', [
        "del" => $del
    ]);
    }
    
    public function tuika(Request $request)
    {
        $id = $request->get('id');
    return view('/admin/k_htuika',[
        "id" => $id
    ]);
    }
    
    public function insert(Request $request)
    {
        $htime = $request->get('htime');
    $name = $request->get('name');
    $hid = $request->get('hid');
    DB::table('delivery')->insert([
        'DEL_DAT'=>$htime,'EMP_ID'=>$name,'SALE_ID'=>$hid,'DEL_CHECK'=>0
    ]);
    return redirect('/k_haitatu');
    }
    
    public function check(Request $request)
    {
        $id = $request->get('id');
    $check = $request->get('check');
    DB::table('delivery')->where('DEL_ID',$id)->update([
        'DEL_CHECK'=>1
    ]);
    return redirect('/k_haitatu');
    }
}