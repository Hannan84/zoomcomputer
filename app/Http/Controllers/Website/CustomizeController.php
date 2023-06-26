<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CustomizationCategory;
use App\Models\CustomizationProduct;
use Illuminate\Http\Request;

class CustomizeController extends Controller
{
    public function customize()
    {
        $categories = CustomizationCategory::with('CustomizeProduct')->get();
        return view('website.layouts.customize',compact('categories'));
    }
    public function order()
    {
        dd('hello');
    }
    public function categoryProduct($id){
        $products = CustomizationProduct::where('customization_category_id',$id)->orderBy('id','DESC')->paginate(5);
        return view('website.layouts.customize_category_product',compact('products'));
    }
    public function addProduct($id)
    {
        $product = CustomizationProduct::find($id);
        dd($id);
        
    }
}
