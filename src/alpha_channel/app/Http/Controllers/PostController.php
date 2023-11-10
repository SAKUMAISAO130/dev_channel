<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
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
        // バリデーションチェック
        $request->validate([
            'title' => 'required|max:10',
            'content' => 'required|min:5|max:140',
        ]);

        // dd($request->all());
        // dd($request->query('title'));
        $post = $request->all();

        $saveData = new post;
        $saveData->title = $request['title'];
        $saveData->content = $request['content'];
        $saveData->show_id_flag = $request['show_id_flag'];
        $saveData->ip_address = $request->ip();

        $saveData->save();

        return view('posts.create', compact('post'));
    }

    public function list (Request $request)
    {
        $posts = Post::get();
        return view('posts.list', compact('posts'));

    }

    public function show (Request $request, $id)
    {
        $post = Post::where('id', $id)->first()->toArray();
        $comments = Comment::where('post_id', $id)->get()->toArray();
        return view('posts.show', compact('post', 'id', 'comments'));

    }

}
