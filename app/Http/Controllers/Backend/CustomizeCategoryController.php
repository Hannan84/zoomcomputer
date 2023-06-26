<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomizationCategory;

class CustomizeCategoryController extends Controller
{
    public function manageCategory()
    {
        $category=CustomizationCategory::all()->sortByDesc('id')->values();
        return view('admin.layouts.customization.category.category_table',compact('category'));
    }
    public function addCategory()
    {
        return view('admin.layouts.customization.category.add_category');
    }
    public function store(Request $request){
        $request->validate([
            'customize_category_name'=>'required|unique:customization_categories',
            'image'=>'required',
        ]);
            $filename = '';
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/uploads/customization/category'), $filename);
            }
            CustomizationCategory::create([
                'customize_category_name'=>$request->customize_category_name,
                'image'=>$filename,
            ]);
            return redirect()->route('admin.manage.customize.category')->with('message','Category Added Successfully');
    }
    public function editCategory($id)
    {
        $category=CustomizationCategory::find($id);
        return view('admin.layouts.customization.category.edit_category',compact('category'));
    }
    public function update(Request $request,$id){
        $category=CustomizationCategory::find($id);
        $category->update([
            'customize_category_name'=>$request->category_name
        ]);
        return redirect()->route('admin.manage.customize.category')->with('message','Category Updated');
    }
    public function delete($id)
    {
        $category=CustomizationCategory::find($id);
        $image = str_replace('\\','/',public_path('uploads/customization/category/'.$category->image));
        if(is_file($image)){
            unlink($image);
            $category->delete();
            return redirect()->route('admin.manage.customize.category')->with('error','Category deleted');
        }else{
            $category->delete();
            return redirect()->route('admin.manage.customize.category')->with('error','image not found! Category deleted');
        }
       
    }
    public function view($id)
    {
        $category=CustomizationCategory::find($id);
        return view('admin.layouts.customization.category.view_category',compact('category'));
    }
    public function change(Request $request,$id){
        $category=CustomizationCategory::find($id);
        $filename = '';
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/uploads/customization/category'), $filename);
            }
        $category->update([
            'image'=>$filename,
        ]);
        return redirect()->route('admin.manage.customize.category')->with('message','Category Image Updated');
    }
}
