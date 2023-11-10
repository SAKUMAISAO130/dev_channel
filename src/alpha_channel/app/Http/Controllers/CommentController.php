<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create (Request $request, $id)
    {
        // バリデーションチェック
        $request->validate([
            'content' => 'required|min:5|max:140',
        ]);

        $saveData = new Comment;
        $saveData->post_id = $id;
        $saveData->content = $request['content'];
        $saveData->show_id_flag = $request['show_id_flag'];
        $saveData->ip_address = $request->ip();

        $saveData->save();

        return redirect('show/'. $id); 
    }
}
