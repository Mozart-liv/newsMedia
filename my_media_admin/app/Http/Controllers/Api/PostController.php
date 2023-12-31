<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //get all post
    public function getPostList(){
        $post = Post::get();
        return response()->json([
            'status' => 'success',
            'post' => $post
        ]);
    }

    //search post
    public function searchPost(Request $request){
        $resultPost = Post::where('title', 'like' , '%'. $request->key . '%')
                            ->orWhere('description', 'like' , '%'. $request->key . '%')->get();
        return response()->json([
            'searchData' => $resultPost
        ]);
    }

    //post detail
    public function postDetail(Request $request){
        $id = $request->postId;
        $post = Post::select('posts.*', 'categories.title as category')
                    ->join('categories', 'posts.category_id', 'categories.id')
                    ->where('posts.id', $id)
                    ->first();

        return response()->json([
            'post' => $post
        ]);
    }
}
