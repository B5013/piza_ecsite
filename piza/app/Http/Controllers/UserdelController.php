<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserdelController extends Controller
{

    public function index(Request $request)
    {
      $id = $request->get('id');
      return view('/withdrawal',compact("id"));
    }

    public function del(Request $request)
    {
      $id = $request->get('id');
      $request->session()->flush();
      DB::table('users')->where('id',$id)->delete();
      return view('/withdrawal_check');
    }
}
