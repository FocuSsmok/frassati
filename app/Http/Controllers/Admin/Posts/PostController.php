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

    public function addPost()
    {
        return view('admin.posts.addpost');
    }

    public function createPost(Request $request)
    {

        $input = $request->all();

        // $this->validate($request, [
        //     "post_img" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $data = [
            "img" => $input["post_img"],
            "title" => $input["post_title"],
            "content" => $input["post_content"],
        ];

        $id = \Auth::user()->id;
        // var_dump($data);
        if ($file = $request->file('post_img')) {
            $extension = $file->getClientOriginalExtension();
            $filename = 'logo-' . time() . '.' . $extension;
            $path = public_path("/img/posts/");
            $file->move($path, $filename);
            $post = new Post();
            $post->user_id = $id;
            $post->title = $data["title"];
            $post->content = $data["content"];
            $post->image = "img/posts/" . $filename;
            $post->date = date('Y-m-d H:i:s');
            $post->save();
            return \redirect()->action('Admin\Posts\PostController@allPosts');
        } else {
            echo "błąd";
        }

    }

    public function updatePost(Request $request, $post_id)
    {

        // $data = $request->all();
        $data = [
            'id' => $post_id,
            'title' => $request->input('post_title'),
            'content' => $request->input('post_content'),
        ];
        // var_dump($data);
        $post = new Post();
        $post->exists = true;
        $post->id = $data["id"];
        $post->title = $data["title"];
        $post->content = $data["content"];
        $post->save();

        return \redirect()->action('Admin\Posts\PostController@allPosts');
    }
}
