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

    public function updatePost(Request $request, $post_id)
    {

        $data = $request->all();
        // $data = [
        //     // 'id' => $data["post_id"],
        //     'title' => $data["post_title"],
        //     'content' => $data["post_content"],
        // ];
        var_dump($post_id);
    }
}
