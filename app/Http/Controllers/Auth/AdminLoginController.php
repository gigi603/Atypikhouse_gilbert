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
            //if unsuccessfull redirect back to the login for with form data
            return redirect()->back()->with('errorAdminLogin', "L'email ou le mot de passe est incorrect");
        }        
      
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
