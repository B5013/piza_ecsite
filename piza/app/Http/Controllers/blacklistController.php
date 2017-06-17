<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class blacklistController extends Controller
{
    public function index()
    {
        $black = DB::table('blacklist')
        ->join('users','blacklist.CL_ID','=','users.id')
        ->select('blacklist.*','users.name')
        ->get();
    return view('admin/k_black',[
        "black" => $black
        ]);
    }
    
    public function tuika(Request $request)
    {
        $id = $request->get('id');
    return view('admin/k_btuika',[
        'id'=>$id
    ]);
    }
    
    public function insert(Request $request)
    {
        $id = $request->get('id');
        $com = $request->get('com');
        $now = Carbon::now();
        DB::table('blacklist')->insert([
            'CL_ID'=>$id,"BL_Date"=>$com,'EMP_ID'=>1,'created_at'=>$now
        ]);
        DB::table('users')->where("id",$id)->update(["black"=>1]);
    return redirect('/k_black');
    }
}