<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $featuredPosts = Post::with('publisher')->where('featured' , 1)->limit(6)->get();
        $posts = Post::with('publisher')->paginate(10);
        $tags = Tag::all();
        return view('pages.home',[
            'posts' => $posts,
            'featuredPosts' => $featuredPosts,
            'tags' => $tags
        ]);
    }

    public function create(){}

    public function store(Request $request){}

    public function show($id){}

    public function edit($id){}

    public function update(Request $request, $id){}

    public function destroy($id){}
}
