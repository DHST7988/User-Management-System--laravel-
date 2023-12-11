<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
protected $redirectTo = '/home';
/**
* Create a new controller instance.
*
* @return void
*/
public function __construct()
{   
    $this->middleware('guest')->except('logout');
    $this->middleware('guest:staff')->except('logout');
    $this->middleware('guest:member')->except('logout');
    $this->middleware('guest:citizen')->except('logout');
}

public function staffLoginForm()
{
    return view('auth.login', ['url' => 'staff']);
}
public function staffLogin(Request $request)
{
    $request->validate(['email' => 'required|email', 'password' => 'required|min:6']);
    if (Auth::guard('staff')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
        $request->session()->put('staffEmail', $request->email);
        $request->session()->put('user_role', 'staff');
        return redirect()->intended('/home/staff');
    }
    //dd($request->only('email', 'password','remember'));
    return back()->withInput($request->only('email', 'remember'));
}

public function memberLoginForm()
{
    return view('auth.login', ['url' => 'member']);
}
public function memberLogin(Request $request)
{
    $request->validate(['email' => 'required|email', 'password' => 'required|min:6']);
    if (Auth::guard('member')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
        $request->session()->put('memberEmail', $request->email);
        $request->session()->put('user_role', 'member');
        return redirect()->intended('/home/member');
    }
    //dd($request->only('email', 'password','remember'));
    return back()->withInput($request->only('email', 'remember'));
}

public function citizenLoginForm()
{
    return view('auth.login', ['url' => 'citizen']);
}
public function citizenLogin(Request $request)
{
    $request->validate(['email' => 'required|email', 'password' => 'required|min:6']);
    if (Auth::guard('citizen')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
        $request->session()->put('citizenEmail', $request->email);
        $request->session()->put('user_role', 'citizen');
        return redirect()->intended('/home/citizen');
    }
    //dd($request->only('email', 'password','remember'));
    return back()->withInput($request->only('email', 'remember'));
}
}

