<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class infoController extends Controller
{

    public function index(Request $request)
    {
      $id = $request->get('id');
      $kakunin = DB::table('users')->where('id',$id)->first();
      return view('/mkakunin',compact('kakunin'));
    }

    public function edi(Request $request)
    {
      $id = $request->get('id');
      $kakunin = DB::table('users')->where('id',$id)->first();
      return view('/change',compact('kakunin'));
    }

    public function update(Request $request)
    {
     $id = $request->get('id');
     $name = $request->get('name');
     $email = $request->get('email');
     $kana = $request->get('kana');
     $tel = $request->get('tel');
     $addn = $request->get('addn');
     $add = $request->get('add');
     DB::table('users')->where('id',$id)->update([
     'name'=>$name,'KANA'=>$kana,'TEL'=>$tel,'email'=>$email,
     'ADDN'=>$addn,'ADD'=>$add
     ]);
     return redirect('/membetr');
    }

}
