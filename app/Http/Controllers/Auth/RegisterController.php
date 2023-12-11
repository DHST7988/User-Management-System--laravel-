<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Staff;
use App\Models\Member;
use App\Models\Citizen;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function memberRegisterForm()
    {
        return view('auth.register', ['url' => 'member']);
    }

    /**
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */

    public function citizenRegisterForm()
    {
        return view('auth.register', ['url' => 'citizen']);
    }

    public function staffRegisterForm()
    {
        return view('auth.register', ['url' => 'staff']);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:30', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function createStaff(Request $request)
    {
        $this->validator($request->all())->validate();
        $staff = new Staff;
        $staff -> name = $request -> name;
        $staff -> email = $request -> email;
        $staff -> password = Hash::make($request -> password);
        $staff -> role = "staff";
        $staff->save();
    
    
        return redirect()->intended('/');
    }
    /**
    * @param Request $request
    *
    * @return \Illuminate\Http\RedirectResponse
    */
    protected function createMember(Request $request)
    {
        $this->validator($request->all())->validate();
        $member = new Member;
        $member -> name = $request -> name;
        $member -> email = $request -> email;
        $member -> password = Hash::make($request -> password);
        $member -> role = "member";
        $member->save();
        
        return redirect()->intended('/');
    }

    protected function createCitizen(Request $request)
    {
        $this->validator($request->all())->validate();
        $citizen = new Citizen;
        $citizen -> name = $request -> name;
        $citizen -> email = $request -> email;
        $citizen -> password = Hash::make($request -> password);
        $citizen -> role = "public";
        $citizen -> save();
        
        return redirect()->intended('/');
    }

}
