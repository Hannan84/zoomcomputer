<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function manageProduct()
    {
        $products = Product::with('category')->orderBy('id','desc')->get();
        return view('admin.layouts.product.product_table', compact('products'));
    }
    public function add()
    {
        $categories = Category::with('product')->get();
        return view('admin.layouts.product.add_product', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required|unique:products',
            'product_name' => 'required|unique:products',
            'regular_price' => 'required',
            'product_image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'product_offer' => 'required',
            'category_id' => 'required',
            'product_description' => 'required',
            // specifications
            'processor' => 'required',
            'display' => 'required',
            'memory' => 'required',
            'storage' => 'required',
            'graphics' => 'required',
            'operating_system' => 'required',
            'battery' => 'required',
            'adapter' => 'required',
            'audio' => 'required',
            'keyboard' => 'required',
            'optical_drive' => 'required',
            'webcam' => 'required',
            'wifi' => 'required',
            'bluetooth' => 'required',
            'USB' => 'required',
            'HDMI' => 'required',
            'VGA' => 'required',
            'audio_jack_combo' => 'required',
            'dimensions' => 'required',
            'weight' => 'required',
            'colors' => 'required',
            'manufacturing_warranty' => 'required',

        ]);

        $filename = '';
        if ($request->hasfile('product_image')) {
            $file = $request->file('product_image');
            $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/products'), $filename);
        }
        Product::create([
            'model' => $request->model,
            'product_name' => $request->product_name,
            'regular_price' => $request->regular_price,
            'product_image' => $filename,
            'product_offer' => $request->product_offer,
            'product_description' => $request->product_description,
            // specifications
            'processor' => $request->processor,
            'display' => $request->display,
            'memory' => $request->memory,
            'storage' => $request->storage,
            'graphics' => $request->graphics,
            'operating_system' => $request->operating_system,
            'battery' => $request->battery,
            'adapter' => $request->adapter,
            'audio' => $request->audio,
            'keyboard' => $request->keyboard,
            'optical_drive' => $request->optical_drive,
            'webcam' => $request->webcam,
            'wifi' => $request->wifi,
            'bluetooth' => $request->bluetooth,
            'USB' => $request->USB,
            'HDMI' => $request->HDMI,
            'VGA' => $request->VGA,
            'audio_jack_combo' => $request->audio_jack_combo,
            'dimensions' => $request->dimensions,
            'weight' => $request->weight,
            'colors' => $request->colors,
            'videoLink' => $request->video_link,
            'manufacturing_warranty' => $request->manufacturing_warranty,

            'category_id' => $request->category_id,
        ]);
        return redirect()->route('admin.manage.product')->with('message', 'Product added successfully');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.layouts.product.edit_product', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update([
            'model' => $request->model,
            'product_name' => $request->product_name,
            'regular_price' => $request->regular_price,
            'product_offer' => $request->product_offer,
            'product_description' => $request->product_description,
            // specifications
            'processor' => $request->processor,
            'display' => $request->display,
            'memory' => $request->memory,
            'storage' => $request->storage,
            'graphics' => $request->graphics,
            'operating_system' => $request->operating_system,
            'battery' => $request->battery,
            'adapter' => $request->adapter,
            'audio' => $request->audio,
            'keyboard' => $request->keyboard,
            'optical_drive' => $request->optical_drive,
            'webcam' => $request->webcam,
            'wifi' => $request->wifi,
            'bluetooth' => $request->bluetooth,
            'USB' => $request->USB,
            'HDMI' => $request->HDMI,
            'VGA' => $request->VGA,
            'audio_jack_combo' => $request->audio_jack_combo,
            'dimensions' => $request->dimensions,
            'weight' => $request->weight,
            'colors' => $request->colors,
            'videoLink' => $request->video_link,
            'manufacturing_warranty' => $request->manufacturing_warranty,
        ]);
        return redirect()->route('admin.manage.product')->with('message', 'Product updated');
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $image = str_replace('\\', '/', public_path('uploads/products/' . $product->product_image));
        if (is_file($image)) {
            unlink($image);
            $product->delete();
            return redirect()->route('admin.manage.product')->with('error', 'Product deleted');
        } else {
            $product->delete();
            return redirect()->back()->with('error', 'image not found! product deleted');
        }
    }

    public function view($id)
    {
        $product = Product::find($id);
        return view('admin.layouts.product.view_product', compact('product'));
    }
    public function change(Request $request, $id)
    {
        $product = Product::find($id);
        $filename = '';
        if ($request->hasfile('product_image')) {
            $file = $request->file('product_image');
            $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/products'), $filename);
        }
        $product->update([
            'product_image' => $filename,
        ]);
        return redirect()->route('admin.manage.product')->with('message', 'Product Image Updated');
    }
}
