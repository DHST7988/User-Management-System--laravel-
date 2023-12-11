<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
public function index()
{
    //$posts=Post::all();
    //return view("posts/index",["posts"=>$posts]);
    return Post::all();
}
public function store (Request $request){
    return Post::create($request->all());
}
public function update (Request $request, $id){
    $post = Post::findOrFail($id);
    $post-> update($request->all());
    return $post;
}
public function destroy($id){
    $post=Post::findOrFail($id);
    $post->delete();
    return 204;
}
/*
public function show()
{
    $posts=Post::all();
    return view("posts/show",["posts"=>$posts]);
}
public function create(Request $req)
{   if (Gate::allows('isAuthor')) {
    //dd('Author allowed');
        $post=new Post;
        $post->title=$req->title;
        $post->content=$req->content;
        $post->user_id=$req->user_id;
        $post->save();
        return redirect('posts/create');
    
    } else {
    dd('You are not an Author');
    }
}
public function edit(Request $req)
{
    if (Gate::allows('isAuthor')) {
    //dd('Author allowed');
    $post=Post::find($req->id); 
    $post->title=$req->title;
    $post->content=$req->content;
    $post->save();
    return redirect('posts/index');
    } else {
    dd('You are not an Author');
    }
}
public function delete()
    {
        if (Gate::allows('isAdmin')) {
        dd('Admin allowed');
        } else {
        dd('You are not Admin');
        }
    }

    public function destroy(Post $post)
    {
        if (Gate::allows('isAdmin')|| Gate::allows('isAuthor') || Gate::allows('isUser')) {
        $post->delete();
        return redirect('posts/index');
        } else {
        dd('You are not Admin');
        }
    }*/
}