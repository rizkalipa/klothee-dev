<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function store(Request $request, $id)
    {
        $post = new \App\Post;

        $request->validate([
            'title' => 'required|max:35',
            'content' => 'required|max:350',
        ]);
    }
}
