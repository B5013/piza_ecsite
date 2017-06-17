<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class accountingController extends Controller
{

    public function index()
    {
      $items = session()->get("items",[]); //セッションデータを取得、nullの場合は空の配列
      $as = session()->get("as",[]); //個数
      $bs = session()->get("bs",[]); //サイズ
      $cs = session()->get("cs",[]); //金額
      return view("/accounting", compact("items","as","bs","cs"));

    }
}
