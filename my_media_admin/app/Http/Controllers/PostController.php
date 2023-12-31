<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(){
        $categories = Category::get();
        $posts = Post::get();
        return view('admin.post.index', compact('categories', 'posts'));
    }

    //create post
    public function createPost(Request $request){
        $this->postVal($request);
        $postData =$this->getPostData($request);

        if(!empty($request->postImg)){
            $file = $request->file('postImg');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path().'/postImg' , $fileName);
        $postData['image'] = $fileName;

        }
        Post::create($postData);
        return back();

    }

    //delete post
    public function deletePost($id){
        $dbData = Post::where('id', $id)->first();
        $dbImageName = $dbData['image'];

        Post::where('id', $id)->delete();
        if(File::exists(public_path(). '/postImg/' . $dbImageName)){
            File::delete(public_path(). '/postImg/' . $dbImageName);
        }

        return back();
    }

    //direct edit page
    public function editPostPage($id){
        $categories = Category::get();
        $post = Post::where('id', $id)->first();
        return view('admin.post.edit', compact('post', 'categories', 'id'));
    }

    //update Post
    public function updatePost(Request $request, $id){
        $this->postVal($request);
        $updatePostData = $this->getPostData($request);

        if(isset($request->postImg)){
            //delete
            $dbData = Post::where('id', $id)->first();
            $dbImageName = $dbData['image'];
            File::delete(public_path(). '/postImg/' . $dbImageName);

            //update
            $file = $request->file('postImg');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path(). '/postImg/' ,$fileName);

            $updatePostData['image'] = $fileName;

        }

        Post::where('id', $id)->update($updatePostData);
        return redirect()->route('admin#postList');
    }

    //detail post
    public function detailPost($id){
        $data = Post::select('posts.*', 'categories.title as category')
                    ->where('posts.id', $id)
                    ->leftJoin('categories', 'categories.id', 'posts.category_id')
                    ->first();
        return view('admin.post.detail', compact('data'));
    }

    //post validation
    private function postVal($request){
        Validator::make($request->all(), [
            'postTitle' => 'required',
            'postDes' => 'required',
            'postImg' => 'mimes:jpeg,png,jpg',
            'postCategory' => 'required'
        ])->validate();
    }

    //getData
    private function getPostData($request){
        return [
            'title' => $request->postTitle,
            'description' => $request->postDes,
            'category_id' => $request->postCategory
        ];
    }
}
