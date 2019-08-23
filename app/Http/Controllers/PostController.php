<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Mail;

class PostController extends Controller
{
    use SerializesModels;

    public function index()
    {
        $posts = \App\Post::orderBy('created_at', 'DESC')->paginate(6);

        return view('posts.index', ['posts' => $posts]);
    }

    public function store(Request $request, $id)
    {
        $post = new \App\Post;
        $user = \App\User::find($id);

        $request->validate([
            'title' => 'required|max:35',
            'content' => 'required|max:350'
        ]);

        $post->title = $request->input('title');
        $post->content = $request->input('content');

        $post->link = Str::after($request->input('link'), 'http://');
        $post->link = Str::after($request->input('link'), 'https://');

        $post->created_by = $user->name;
        $post->created_at = now();
        $post->user_id = $user->id;
        $post->status = $request->get('status');

        if ($request->hasFile('image') && $request->file('image')->isValid())
        {
            $path = $request->image->store('image_contents', 'public');
            $post->image = $path;
        }

        $post->save();
        
        return redirect()->route('post.index')->with('status', "Post Saved to " . $post->status);
    }

    public function edit($id)
    {
        $post = \App\Post::find($id);

        return view('posts.edit', ['post' => $post]);
    }
}
