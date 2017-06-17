<?php
namespace App\Http\Controllers\AdminAuth;
use App\Admin;
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
        return view('admin/auth/register');
    }
    
    public function tuika(Request $request)
    {
        $name = $request->get('name');
    $email = $request->get('email');
    $password = $request->get('password');
    $ms = $request->get('ms');
    DB::table('admins')->insert([ 'name'=>$name,'email'=>$email,'master'=>$ms,'password'=>bcrypt($password)
    ]);
    return redirect('/k_jyugyoin');
    }
}