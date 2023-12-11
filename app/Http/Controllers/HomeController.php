<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Publiccase;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home(){
        // $tasks = Task::orderBy('id', 'desc')->get();
        // return view('index', compact('tasks'));
        // dd(Auth::user()->id);
        $employer_id = Auth::user()->id;
        $events = Event::take(3)->get();
        $cases = Publiccase::take(3)->get();
        $projects = Project::take(3)->get();
        
        return view('home',['events'=>$events, 'cases'=>$cases, 'projects'=>$projects]);
    }
}
