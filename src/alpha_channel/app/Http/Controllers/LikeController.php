<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like (Request $request, $id)
    {
        dd($request->ip());
    }

    public function unlike (Request $request, $id)
    {
        dd($request->ip());
    }

}
