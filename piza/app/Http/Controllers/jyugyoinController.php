<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class jyugyoinController extends Controller
{
    public function index()
    {
        $jyu = DB::table('admins')->get();
    return view('admin/k_jyugyoin', [
        "jyu" => $jyu
    ]);
    }
}