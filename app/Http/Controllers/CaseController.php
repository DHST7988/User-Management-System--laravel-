<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Publiccase;
use Illuminate\Http\Facades\DB;
use Illuminate\Support\Facades\Validator;
class CaseController extends Controller
{
    public function displayForm(){
        
        return view('/publiccases/createCases');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required'],
            'date'  => ['required'],
            'short_description' => ['required'],
            'description' => ['required'],
            'status'  => ['required'],
            'image' => ['mimes:png,jpeg,jpg'],
        ]);
    }
    public function createCase(Request $request)
    {
        $this->validator($request->all())->validate();
        
        $case = new Publiccase;
        $case -> title = $request -> title;
        $case -> date = $request -> date;
        $case -> short_description = $request -> short_description;
        $case -> description = $request -> description;
        $case -> status = $request -> status;
        if ($request->hasFile('image')) {
            $upload = $request->file('image');
            $name = time().'.'.$upload->getClientOriginalExtension();
            $path = $upload->storeAs('public', $name);
            $case->image = !empty($name)? 'storage/'.$name : null;
        }
        $case -> save();
        return redirect()->intended('home/staff');

    }
    public function caseDetail($id)
    {
        $data = Publiccase::find($id);
        return view('publiccases/case',['data'=>$data]);
    }

    public function getCases(){
        $cases = Publiccase::all();
     
        return view('publiccases/view',['cases'=>$cases]);
    }

    public function editForm($id){
        $data = Publiccase::find($id);
    
        return view('publiccases/edit',['data'=>$data]);
    }
    public function editCase($id, Request $request){
        $this->validator($request->all())->validate();
        
        $case = Publiccase::find($id);
        $case -> title = $request -> title ?? $case -> title;
        $case -> venue = $request -> venue ?? $case -> venue;
        $case -> start_date = $request -> start_date ?? $case -> start_date;
        $case -> end_date = $request -> end_date ?? $case -> end_date;
        $case -> status = $request -> status ?? $case -> status;
        if ($request->hasFile('image')) {
            $upload = $request->file('image');
            $name = time().'.'.$upload->getClientOriginalExtension();
            $path = $upload->storeAs('public', $name);
            $case->image = !empty($name)? 'storage/'.$name : null;
        }
        else{
            $case->image = $case->image;
        }
        $event -> save();
        return redirect()->intended('cases');
    }
    public function deleteEvent($id){
        Event::destroy($id);

        return redirect('cases')->with(['data'=>$result]);
    }
}
