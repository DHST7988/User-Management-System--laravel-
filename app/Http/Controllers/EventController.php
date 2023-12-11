<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
class EventController extends Controller
{
    public function displayForm(){
        
        return view('/events/create');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required'],
            'venue'  => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'status' => ['required'],
            'image' => ['mimes:png,jpeg,jpg'],
        ]);
    }
    public function createEvent(Request $request)
    {
        $this->validator($request->all())->validate();
        
        $event = new Event;
        $event -> title = $request -> title;
        $event -> venue = $request -> venue;
        $event -> start_date = $request -> start_date;
        $event -> end_date = $request -> end_date;
        $event -> status = $request -> status;
        if ($request->hasFile('image')) {
            $upload = $request->file('image');
            $name = time().'.'.$upload->getClientOriginalExtension();
            $path = $upload->storeAs('public', $name);
            $event->image = !empty($name)? 'storage/'.$name : null;
        }
        $event -> save();
        return redirect()->intended('events/create');

    }
    public function getEvent(){
        $events['past'] = Event::where('status', 'past')->get();
        $events['ongoing'] = Event::where('status', 'ongoing')->get();
     
        return view('events/view',['events'=>$events]);
    }
    public function editForm($id){
        $data = Event::find($id);
    
        return view('events/edit',['data'=>$data]);
    }
    public function editEvent($id, Request $request){
        $this->validator($request->all())->validate();
        
        $event = Event::find($id);
        $event -> title = $request -> title ?? $event -> title;
        $event -> venue = $request -> venue ?? $event -> venue;
        $event -> start_date = $request -> start_date ?? $event -> start_date;
        $event -> end_date = $request -> end_date ?? $event -> end_date;
        $event -> status = $request -> status ?? $event -> status;
        if ($request->hasFile('image')) {
            $upload = $request->file('image');
            $name = time().'.'.$upload->getClientOriginalExtension();
            $path = $upload->storeAs('public', $name);
            $event->image = !empty($name)? 'storage/'.$name : null;
        }
        else{
            $event->image = $event->image;
        }
        $event -> save();
        return redirect()->intended('events');
    }
    public function deleteEvent($id){
        Event::destroy($id);

        return redirect('events');
    }
}
