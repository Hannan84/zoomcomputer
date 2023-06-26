<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function manageCategory()
    {
        $category=Category::all()->sortByDesc('id')->values();
        return view('admin.layouts.category.category_table',compact('category'));
    }
    public function addCategory()
    {
        return view('admin.layouts.category.add_category');
    }
    public function store(Request $request){
        $request->validate([
            'category_name'=>'required|unique:categories',
            'image'=>'required',
        ]);
            $filename = '';
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/uploads/category'), $filename);
            }
            Category::create([
                'category_name'=>$request->category_name,
                'image'=>$filename,
            ]);
            return redirect()->route('admin.manage.category')->with('message','Category Added Successfully');
    }
    public function editCategory($id)
    {
        $category=Category::find($id);
        return view('admin.layouts.category.edit_category',compact('category'));
    }
    public function update(Request $request,$id){
        $category=Category::find($id);
        $category->update([
            'category_name'=>$request->category_name
        ]);
        return redirect()->route('admin.manage.category')->with('message','Category Updated');
    }
    public function delete($id)
    {
        $category=Category::find($id);
        $image = str_replace('\\','/',public_path('uploads/category/'.$category->image));
        if(is_file($image)){
            unlink($image);
            $category->delete();
            return redirect()->route('admin.manage.category')->with('error','Category deleted');
        }else{
            $category->delete();
            return redirect()->route('admin.manage.category')->with('error','no image found! Category deleted');
        }
        
    }
    public function view($id)
    {
        $category=Category::find($id);
        return view('admin.layouts.category.view_category',compact('category'));
    }
    public function change(Request $request,$id){
        $category=Category::find($id);
        $filename = '';
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/uploads/category'), $filename);
            }
        $category->update([
            'image'=>$filename,
        ]);
        return redirect()->route('admin.manage.category')->with('message','Category Image Updated');
    }
}
