<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Auth;



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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'http://127.0.0.1:8000/';
        
    // public function login(Request $request){
    //     $user = Auth::user();
    //     var_dump($user);
    //     if($user[0]["statut"] == 1){
    //         //return redirect('/');
    //     } else {
    //         //return redirect()->back()->with('danger', "Utilisateur non existant");
    //     }
    // }

    protected function login(Request $request)
    {
        var_dump($request->email);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            //return redirect()->intended('/');
            var_dump('cava');
            $user = Auth::user();
            if($user->statut == 1) {
                var_dump("connect");
                $redirectTo;
            } else {
                var_dump("pas bon");
                //return view('auth.login')->with('danger', "Utilisateur non existant");
            }
        }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('guest')->except('logout');
    }

}
