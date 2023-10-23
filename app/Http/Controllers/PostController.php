<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    function show()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('client.home', compact('posts'));
    }
    function detail($slug)
    {
        $post = Post::where('slug', 'like', $slug)->first();
        $title = $post->title;
        return view('client.detail', compact('title'));
    }
}
