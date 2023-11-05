<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function new (Request $request)
    {
        $post = new Post;

        return view('posts.new', compact('post'));
    }

    public function create (Request $request)
    {
        // dd($request->all());
        // dd($request->query('title'));
        $post = $request->all();

        return view('posts.create', compact('post'));
    }

    public function save (Request $request)
    {
        $post = new post;

        $post->title = 'test' . rand();
        $post->content = 'test' . rand();
        $post->show_id_flag = 'test' . rand();
        $post->ip_address = $request->ip();

        $post->save();
    }

}
