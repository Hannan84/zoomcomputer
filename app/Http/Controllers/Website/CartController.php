<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(Request $request,$id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('website.home')->with('error', 'there is no product into the cart');
        }
        $cartExist = session()->get('cart');
        // case-1:no cart
        if (!$cartExist) {
            if(!$request->deal){
                $cartData = [$id => [
                    'product_id' => $product->id,
                    'product_model' => $product->model,
                    'product_name' => $product->product_name,
                    'regular_price' => $product->regular_price,
                    'product_offer' => $product->product_offer,
                    'product_quantity' => 1,
                ]];
                session()->put('cart', $cartData);
                return redirect()->back()->with('message', 'Product added into the cart');
            }
            else{
                $cartData = [$id => [
                    'product_id' => $product->id,
                    'product_model' => $product->model,
                    'product_name' => $product->product_name,
                    'regular_price' => ($product->regular_price - $product->product_offer),
                    'product_offer' => $product->product_offer,
                    'product_quantity' => 1,
                ]];
                session()->put('cart', $cartData);
                return redirect()->back()->with('message', 'Product added into the cart');
            }
        }
        // case-2:already one cart exist
        if (!isset($cartExist[$id])) {
            if(!$request->deal){
                $cartExist[$id] = [
                    'product_id' => $product->id,
                    'product_model' => $product->model,
                    'product_name' => $product->product_name,
                    'regular_price' => $product->regular_price,
                    'product_offer' => $product->product_offer,
                    'product_quantity' => 1,
                ];
                session()->put('cart', $cartExist);
                return redirect()->back()->with('message', 'Product added into the cart');
            }
            else{
                $cartExist[$id] = [
                    'product_id' => $product->id,
                    'product_model' => $product->model,
                    'product_name' => $product->product_name,
                    'regular_price' => ($product->regular_price - $product->product_offer),
                    'product_offer' => $product->product_offer,
                    'product_quantity' => 1,
                ];
                session()->put('cart', $cartExist);
                return redirect()->back()->with('message', 'Product added into the cart');
            }
        }
        // case-3: same product adding into the cart        
        if(!$request->deal){
            $cartExist[$id]['product_quantity'] = $cartExist[$id]['product_quantity'] + 1;
            session()->put('cart', $cartExist);
            return redirect()->back()->with('message', 'Product already added into the cart and quantity');
        }
        else{
            $cartExist[$id]['product_quantity'] = $cartExist[$id]['product_quantity'] + 1;
            $cartExist[$id]['product_offer'] = $cartExist[$id]['product_offer'] + $product->product_offer;
            session()->put('cart', $cartExist);
            return redirect()->back()->with('message', 'Product already added into the cart and quantity');
        }
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->route('website.home')->with('error', 'Cart Cleared');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back()->with('error', 'Product deleted from cart');
    }


    public function checkout()
    {
        $carts = session()->get('cart');
        if ($carts) {
            foreach ($carts as $cart)
                Order::create([
                    'customer_id' => auth()->user()->id,
                    'name' => auth()->user()->name,
                    'email' => auth()->user()->email,
                    'phone' => auth()->user()->phone,
                    'product_id' => $cart['product_id'],
                    'product_name' => $cart['product_name'],
                    'model' => $cart['product_model'],
                    'price' => $cart['regular_price'],
                    'offer' => $cart['product_offer'],
                    'quantity' => $cart['product_quantity'],
                    'total' => ($cart['regular_price'] * $cart['product_quantity']) - ($cart['regular_price'] * $cart['product_quantity'] * ($cart['product_offer'] / 100)),
                ]);
            session()->forget('cart');
            return redirect()->back()->with('message', 'Order place successfully. Now Click -- PROCESS TO PAY -- to confirm order');
        }
        return redirect()->back()->with('error', 'No data found into the cart');
    }


    public function orderForm(Request $request, $id)
    {
        $product = Product::find($id);
        $stock = Stock::where('product_id',$product->id)->get();


//        foreach($stock as $st_qty){
//            $st_qty->total_produce;
//        }
        if (empty($stock[0])) {
            return redirect()->back()->with('error', 'Out of stock');
        }
        else if ($stock[0]->total_produce < $request->quantity) {
            return redirect()->back()->with('error', 'Out of stock');
        }
        else{
            $cartExist = session()->get('cart');
            // case-1:no cart
            if (!$cartExist) {
                $cartData = [$id => [
                    'product_id' => $product->id,
                    'product_model' => $product->model,
                    'product_name' => $product->product_name,
                    'regular_price' => $product->regular_price,
                    'product_offer' => $product->product_offer,
                    'product_quantity' => $request->quantity,
                ]];
                session()->put('cart', $cartData);
                return redirect()->back()->with('message', 'Product added into the cart');
            }
            // case-2:already one cart exist
            if (!isset($cartExist[$id])) {
                $cartExist[$id] = [
                    'product_id' => $product->id,
                    'product_model' => $product->model,
                    'product_name' => $product->product_name,
                    'regular_price' => $product->regular_price,
                    'product_offer' => $product->product_offer,
                    'product_quantity' => $request->quantity,
                ];
                session()->put('cart', $cartExist);
                return redirect()->back()->with('message', 'Product added into the cart');
            }
            // case-3: same product adding into the cart
            $cartExist[$id]['product_quantity'] = $cartExist[$id]['product_quantity'] + 1;
            session()->put('cart', $cartExist);
            return redirect()->back()->with('message', 'Product added into the cart');
        }
    }
}
