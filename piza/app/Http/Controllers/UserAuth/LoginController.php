<?php
namespace App\Http\Controllers\UserAuth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
     public function logout(Request $request)
      {
          $this->guard()->logout();

          $request->session()->flush();

          $request->session()->regenerate();

          return redirect('/');
      }

    public function __construct()
    {
        $this->middleware('user.guest', ['except' => 'logout']);
    }
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('user.auth.login');
    }
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('user');
    }
    
    public function login(Request $request){
        $email = $request->get('email');
        $password = $request->get('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // 認証通過…
            if( Auth::user()->black ==0 ){
            return redirect()->intended('/');
            }else{
                $this->guard()->logout();

          $request->session()->flush();

          $request->session()->regenerate();

          return redirect('/tou');
            }
        }else{
            return redirect('/user/login');
        }
    }
}