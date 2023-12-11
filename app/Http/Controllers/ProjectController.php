<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\Project;
class ProjectController extends Controller
{
    public function displayForm(){
        
        return view('/projects/create');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required'],
            'author'  => ['required'],
            'short_description' => ['required'],
            'description' => ['required'],
            'status' => ['required'],
            'image' => ['mimes:png,jpeg,jpg'],
        ]);
    }
    public function createProject(Request $request)
    {
        $this->validator($request->all())->validate();
        
        $project = new Project;
        $project -> title = $request -> title;
        $project -> author = $request -> author;
        $project -> short_description = $request -> short_description;
        $project -> description = $request -> description;
        $project -> status = $request -> status;
        if ($request->hasFile('image')) {
            $upload = $request->file('image');
            $name = time().'.'.$upload->getClientOriginalExtension();
            $path = $upload->storeAs('public', $name);
            $project->image = !empty($name)? 'storage/'.$name : null;
        }
        $project -> save();
        return redirect()->intended('projects/create');

    }
    public function getProjects(){
        $projects['past'] = Project::where('status', 'past')->get();
        $projects['ongoing'] = Project::where('status', 'ongoing')->get();
     
        return view('projects/view',['projects'=>$projects]);
    }
    public function editForm($id){
        $data = Project::find($id);
    
        return view('projects/edit',['data'=>$data]);
    }
    public function editProject($id, Request $request){
        $this->validator($request->all())->validate();
        
        $project = Project::find($id);
        $project -> title = $request -> title ?? $project -> title;
        $project -> author = $request -> author ?? $project -> author;
        $project -> short_description = $request -> short_description ?? $project -> short_description;
        $project -> description = $request -> description ?? $project -> description;
        $project -> status = $request -> status ?? $project -> status;
        if ($request->hasFile('image')) {
            $upload = $request->file('image');
            $name = time().'.'.$upload->getClientOriginalExtension();
            $path = $upload->storeAs('public', $name);
            $project->image = !empty($name)? 'storage/'.$name : null;
        }
        else{
            $project->image = $project->image;
        }
        $project -> save();
        return redirect()->intended('projects');
    }
    public function deleteProject($id){
        Project::destroy($id);

        return redirect('projects');
    }
    public function projectDetail($id)
    {
        $data = Project::find($id);
        return view('projects/project',['data'=>$data]);
    }
}
