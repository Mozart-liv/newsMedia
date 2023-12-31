<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categoryData = Category::when(request('search'))
                        ->where('title', 'like', '%' . request('search') . '%')
                        ->orWhere('description', 'like', '%' . request('search') . '%')->get();
        return view('admin.category.index', compact('categoryData'));
    }

    //create category
    public function createCategory(Request $request){
        $this->Val($request);
        $data = $this->getData($request);

        Category::create($data);

        return back();
    }

    //delete category
    public function deleteCategory($id){
        Category::where('id', $id)->delete();
        return back()->with(['success'=>'Category deleted Successfully!']);
    }

    //direct edit category page
    public function editCategoryPage($id){
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category', 'id'));
    }

    //update category
    public function updateCategory(Request $request, $id){
        $this->Val($request);
        $updateData = $this->getData($request);
        Category::where('id', $id)->update($updateData);

        return redirect()->route('admin#category')->with(['success'=> 'updated Successfully!']);
    }

    //validate
    private function Val($request){
        Validator::make($request->all(), [
            'categoryName' => 'required',
            'categoryDes' => 'required'
        ])->validate();
    }

    //get category data
    private function getData($request){
        return [
            'title' => $request->categoryName,
            'description' => $request->categoryDes
        ];
    }
}
