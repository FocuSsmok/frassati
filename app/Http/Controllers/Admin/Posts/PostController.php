<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Posts\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allPosts(Request $request)
    {
        $posts = Post::paginate(10);
        return view("admin.posts.posts", ['posts' => $posts]);
    }

    public function editPost($post_id)
    {
        $post = Post::find($post_id);
        return view('admin.posts.editpost', compact('post'));
    }
}
