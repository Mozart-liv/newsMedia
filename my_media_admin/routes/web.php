<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrendPostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::controller(ProfileController::class)->group(function(){
        Route::get('/dashboard', 'index')->name('admin#profile');
        Route::post('profile/update', 'updateProfile')->name('profile#update');

        //chang password
        Route::get('changePassword', 'changePasswordPage')->name('profile#changePasswordPage');
        Route::post('changePassword', 'changePassword')->name('profile#changePassword');
    });

    //category
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/category', 'index')->name('admin#category');
        Route::post('/category/create', 'createCategory')->name('admin#createCategory');
        Route::get('/category/delete/{id}', 'deleteCategory')->name('admin#deleteCategory');
        Route::get('/category/edit/{id}' , 'editCategoryPage')->name('admin#editCategoryPage');
        Route::post('/category/update/{id}', 'updateCategory')->name('admin#updateCategory');
    });

    //adminList
    Route::controller(UserController::class)->group(function(){
        Route::get('/adminList', 'index')->name('admin#adminList');
        Route::get('admin/delete/{id}', 'deleteAcc')->name('admin#deleteAcc');
    });

    //post
    Route::controller(PostController::class)->group(function(){
        Route::get('/post', 'index')->name('admin#postList');
        Route::post('/post/create', 'createPost')->name('admin#createPost');
        Route::get('/post/delete/{id}', 'deletePost')->name('admin#deletePost');
        Route::get('/post/edit/{id}', 'editPostPage')->name('admin#editPostPage');
        Route::post('/post/update/{id}' , 'updatePost')->name('admin#updatePost');
        Route::get('/post/detail/{id}', 'detailPost')->name('admin#detailPost');
    });

    Route::controller(TrendPostController::class)->group(function(){
        Route::get('/trendPost', 'index')->name('admin#trendPost');
    });
});
