<?php
namespace App\Http\Controllers\UserAuth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    public function index()
    {
        return view('user/auth/register');
    }
    
    public function tuika(Request $request)
    {
        $name = $request->get('name');
    $email = $request->get('email');
    $password = $request->get('password');
    $kana = $request->get('kana');
    $tel = $request->get('tel');
    $addn = $request->get('addn');
    $add = $request->get('add');
    DB::table('users')->insert([
    'name'=>$name,'KANA'=>$kana,'TEL'=>$tel,'email'=>$email,
    'password'=>bcrypt($password),'ADDN'=>$addn,'ADD'=>$add,'black'=>0
    ]);
    return redirect('user/login');
    }
}