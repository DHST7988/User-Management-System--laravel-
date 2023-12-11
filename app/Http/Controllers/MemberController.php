<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class MemberController extends Controller
{
    public function getMember(){
        $members = Member::all();
     
        return view('members/member',['members'=>$members]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:30', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    public function editForm($id){
        $data = Member::find($id);
    
        return view('members/edit',['data'=>$data]);
    }

    public function editMember($id, Request $request){
        $this->validator($request->all())->validate();
        
        $member = Member::find($id);
        $member -> name = $request -> name ?? $member -> name;
        $member -> email = $request -> email ?? $member -> email;
        $member -> password = Hash::make($request -> password);
        $member -> role = "member";
        $member -> save();
        return redirect('member');
    }
    public function deleteMember($id){
        Member::destroy($id);

        return redirect('member');
    }

    public function memberDashboard(){
        $user = Auth::user();
        $id = $user->id;
        $data = Member::find($id);
        return view('members/dashboard',['data'=>$data]);
    }
}
