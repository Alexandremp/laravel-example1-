<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $category = new Category;
            $category->name=$data['category_name'];
            $category->parent_id =$data['parent_id'];
            $category->description=$data['description'];
            $category->url=$data['url'];
            $category->save();

            return redirect('/admin/view-categories')->with('flash_message_success','Category was added successfully!');
        }

        $levels = Category::where(['parent_id'=>0])->get();

        return view('admin.categories.add_category')->with(compact('levels'));
    }

    public  function viewCategories(){
        $categories = Category::get();
        return view('admin.categories.view_categories')->with(compact('categories'));

    }

    public function editCategory(Request $request, $id =null){
        if($request->isMethod('post')) {
            $data = $request->all();
            Category::where(['id' => $id])->update([
                'name' => $data['category_name'],
                'description' => $data['description'],
                'parent_id'=>$data['parent_id'],
                'url' => $data['url']

            ]);
            return redirect('/admin/view-categories')->with('flash_message_success', 'Category was edited successfully!');
        }
        $levels = Category::where(['parent_id'=>0])->get();
        $categoryDetails = Category::where(['id'=>$id])->first();
        return view('admin.categories.edit_category')->with(compact('categoryDetails','levels'));


    }

    public function deleteCategory(Request $request, $id=null){
        if(!empty($id)){
            /** @noinspection PhpUnhandledExceptionInspection */
            Category::where(['id' => $id])->delete();
            return redirect()->back()->with('flash_message_success', 'Category was deleted successfully!');



        }
    }
}


