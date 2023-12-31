<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //get all category
    public function getCategoryList(){
        $category = Category::select('id', 'title', 'description')->get();

        return response()->json(['category' => $category]);
    }

    //search category
    public function searchCategory(Request $request){
        $resultCategory = Post::where('category_id', 'like', '%'. $request->key . '%')->get();
        return response()->json([
            'searchData' => $resultCategory
        ]);
    }
}
