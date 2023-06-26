<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function manageStock(){
        $stock=Stock::with('product')->orderBy('id','desc')->get();
        return view('admin.layouts.stock.stock_table',compact('stock'));
    }
    public function add(){
        $stock=Product::with('stock')->get();
        return view('admin.layouts.stock.add_stock', compact('stock'));
    }
    public function store(Request $request){
        $request->validate([
            "product_id" => "required",
            "total_produce" => "required"
        ]);
        Stock::create([
            "product_id" => $request->product_id,
            "total_produce" => $request->total_produce
        ]);
        return redirect()->route('admin.manage.stock')->with('message', 'Stock added succefully');

    }
    public function edit($id){
        $stock=Stock::find($id);
        return view('admin.layouts.stock.edit_stock',compact('stock'));
    }
    public function update(Request $request,$id){
        $stock=Stock::find($id);
        $stock->update([
            "total_produce" => $request->total_produce
        ]);
        return redirect()->route('admin.manage.stock')->with('message', 'Stock updated');
    }
    public function delete($id){
        $stock=Stock::find($id);
        $stock->delete();
        return redirect()->route('admin.manage.stock')->with('error', 'Stock deleted');
    }
}
