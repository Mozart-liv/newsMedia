<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ActionLogController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->group(function(){
    Route::post('user/login', 'login');
    Route::post('user/register', 'register');
});

//get post
Route::controller(PostController::class)->group(function(){
    Route::get('postList', 'getPostList');
    Route::post('post/search', 'searchPost');
    Route::post('post/detail', 'postDetail');
});


//get category
Route::controller(CategoryController::class)->group(function(){
    Route::get('categoryList', 'getCategoryList');
    Route::post('category/search', 'searchCategory');

});

//get post Action log
Route::post('post/actionLog', [ActionLogController::class, 'index']);
