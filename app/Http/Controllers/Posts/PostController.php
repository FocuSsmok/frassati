<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Posts\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPosts(Request $request)
    {
        $posts = Post::paginate(10);
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

}
