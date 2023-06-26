<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CustomizationCategory;
use App\Models\CustomizationProduct;
use Illuminate\Http\Request;

class CustomizeProductController extends Controller
{
    public function manageProduct()
    {
        $products = CustomizationProduct::with('CustomizeCategory')->orderBy('id','desc')->get();
        return view('admin.layouts.customization.product.product_table', compact('products'));
    }
    public function add()
    {
        $products = CustomizationCategory::with('CustomizeProduct')->get();
        return view('admin.layouts.customization.product.add_product', compact('products'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'model'=>'required',
            'name'=>'required',
            'price'=>'required',
            'image'=>'required',
            'description'=>'required',

            'clock_speed'=>'required',
            'cache'=>'required',
            'cores'=>'required',
            'socket'=>'required',

            // Specifications
            'base_frequency'=>'required',
            'threads'=>'required',
            'default_TDP'=>'required',

            'maximum_size'=>'required',
            'maximum_speed'=>'required',
            'type'=>'required',
            'maximum_number_channels'=>'required',

            'processor_graphics'=>'required',
            'maximum_dynamic_frequency'=>'required',

            'warranty'=>'required',

            'customization_category_id'=>'required',
        ]);

        $filename = '';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/customization/products'), $filename);
        }
        CustomizationProduct::create([
            'model'=>$request->model,
            'name'=>$request->name,
            'price'=>$request->price,
            'image'=>$filename,
            'description'=>$request->description,
            'clock_speed'=>$request->clock_speed,
            'cache'=>$request->cache,
            'cores'=>$request->cores,
            'socket'=>$request->socket,

            // Specifications
            'base_frequency'=>$request->base_frequency,
            'threads'=>$request->threads,
            'default_TDP'=>$request->default_TDP,

            'maximum_size'=>$request->maximum_size,
            'maximum_speed'=>$request->maximum_speed,
            'type'=>$request->type,
            'maximum_number_channels'=>$request->maximum_number_channels,

            'processor_graphics'=>$request->processor_graphics,
            'maximum_dynamic_frequency'=>$request->maximum_dynamic_frequency,

            'warranty'=>$request->warranty,

            'customization_category_id'=>$request->customization_category_id,
        ]);
        return redirect()->route('admin.manage.customize.product')->with('message', 'Product added successfully');
    }
    public function edit($id)
    {
        $product = CustomizationProduct::find($id);
        return view('admin.layouts.customization.product.edit_product', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = CustomizationProduct::find($id);
        $product->update([
            'model'=>$request->model,
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,

            'clock_speed'=>$request->clock_speed,
            'cache'=>$request->cache,
            'cores'=>$request->cores,
            'socket'=>$request->socket,

            // Specifications
            'base_frequency'=>$request->base_frequency,
            'threads'=>$request->threads,
            'default_TDP'=>$request->default_TDP,

            'maximum_size'=>$request->maximum_size,
            'maximum_speed'=>$request->maximum_speed,
            'type'=>$request->type,
            'maximum_number_channels'=>$request->maximum_number_channels,

            'processor_graphics'=>$request->processor_graphics,
            'maximum_dynamic_frequency'=>$request->maximum_dynamic_frequency,

            'warranty'=>$request->warranty,

        ]);
        return redirect()->route('admin.manage.customize.product')->with('message', 'Product updated');
    }
    public function delete($id)
    {
        $product = CustomizationProduct::find($id);
        $image = str_replace('\\', '/', public_path('uploads/customization/products/' . $product->image));
        if (is_file($image)) {
            unlink($image);
            $product->delete();
            return redirect()->route('admin.manage.customize.product')->with('error', 'Product deleted');
        } else {
            return redirect()->back()->with('error', 'File Not found');
        }
    }

    public function view($id)
    {
        $product = CustomizationProduct::find($id);
        return view('admin.layouts.customization.product.view_product', compact('product'));
    }
    public function change(Request $request, $id)
    {
        $product = CustomizationProduct::find($id);
        $filename = '';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/customization/products'), $filename);
        }
        $product->update([
            'image' => $filename,
        ]);
        return redirect()->route('admin.manage.customize.product')->with('message', 'Product Image Updated');
    }
}
