<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminLoginController extends Controller
{
    public function __construct()
    {
        Auth::logout();
        //defining our middleware for this controller
        $this->middleware('guest:admin',['except' => ['logout']]);
    }
    //function to show admin login form
    public function showLoginForm() {
        return view('auth.admin-login');
    }
    //function to login admins
    public function login(Request $request) {
        //validate the form data
        $valid = $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        //attempt to login the admins in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            //if successful redirect to admin dashboard in list users view
            return redirect()->route('admin.listusers');
        } else {
            $errors = [$this->username() => trans('auth.failed')];
        }
        //if unsuccessfull redirect back to the login for with form data
        //return redirect()->back()->withInput($request->only('email','remember'));
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
      
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
