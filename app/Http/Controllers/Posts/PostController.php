<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Posts\Post;
use App\Models\User\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPosts(Request $request)
    {
        // $posts = DB::table('posts')
        //     ->join("users", "user_id", '=', "users.id")
        //     ->select("posts.*", "users.name")
        //     ->simplePaginate(10);
        $posts = Post::orderBy("date", "desc")->paginate(10, ["id", "user_id", "title", "image", "content", "date"]);
        // $posts->getCollection()->transform(function ($value) {
        //     $value->user = "janek";
        // });
        foreach ($posts as $post) {
            $user = $post->user_id;
            $post->offsetUnset("user_id");

            $userName = User::find($user)->name;
            $post->offsetSet('author', "$userName");

        }
        $response = [
            'pagination' => [
                'total' => $posts->total(),
                'per_page' => $posts->perPage(),
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'from' => $posts->firstItem(),
                'to' => $posts->lastItem(),
            ],
            'data' => $posts,
        ];
        return response()->json($response);
    }

    public function getSinglePost(Request $request)
    {
        $post = Post::find($request->id);
        $userName = User::find($post->user_id)->name;
        $post->offsetUnset("user_id");
        $post->offsetSet("author", $userName);
        return response()->json($post);
    }
}
