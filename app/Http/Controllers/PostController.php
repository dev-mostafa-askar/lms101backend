<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function list(){
        return view('posts.list-posts',[
            'posts' => Post::all()
        ]);
    }

    public function create(){
        return view('posts.create-post');
    }
    public function store(Request $request){
       $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ]);
        $image = '';
        if($request->has('image')){
            $image  = $request->file("image")->store('public/posts');
        }
        $image = str_replace('public','storage',$image);
        $data['image'] = $image;
        $data['user_id'] = 1;
        Post::create($data);
        return redirect(route('admin.list.posts'))->with('success','Created successfully!');

    }
}
