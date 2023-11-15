<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\orderDetails;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Models\User;

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
            $cartData = [$id => [
                'product_id' => $product->id,
                'product_model' => $product->model,
                'product_name' => $product->product_name,
                'regular_price' => $product->regular_price,
                'product_offer' => $product->product_offer * $request->quantity,
                'product_quantity' => $request->quantity,
            ]];
            session()->put('cart', $cartData);
            toastr()->success('Product added into the cart');
            return redirect()->back();
        }
        // case-2:already one cart exist
        if (!isset($cartExist[$id])) {
            $cartExist[$id] = [
                'product_id' => $product->id,
                'product_model' => $product->model,
                'product_name' => $product->product_name,
                'regular_price' => $product->regular_price,
                'product_offer' => $product->product_offer * $request->quantity,
                'product_quantity' => $request->quantity,
            ];
            session()->put('cart', $cartExist);
            toastr()->success('Product added into the cart');
            return redirect()->back();
        }
        // case-3: same product adding into the cart        
        $cartExist[$id]['product_quantity'] = $cartExist[$id]['product_quantity'] + $request->quantity;
        $cartExist[$id]['product_offer'] = $cartExist[$id]['product_offer'] + ($product->product_offer * $request->quantity);
        session()->put('cart', $cartExist);
        toastr()->success('Product already added into the cart and update quantity');
        return redirect()->back();
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->route('website.home')->with('warning', 'Cart Cleared');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back()->with('warning', 'Product deleted from cart');
    }


    public function checkout()
    {

        $user = User::find(auth()->user()->id);
        $subTotal = 0;
        $offerTotal = 0;
        $carts = session()->get('cart');
        if ($carts) {
            foreach ($carts as $cart){
                $subTotal += $cart['regular_price'] * $cart['product_quantity'];
                $offerTotal += $cart['product_offer'];
            }
        }
        if(!$carts){
            return redirect()->back()->with('warning', 'No product into the cart');
        }
        return view('website.layouts.checkout',compact('user','subTotal','offerTotal'));
    }
    public function orderPlace(Request $request)
    {
        // order insert
        $orderId = Order::create([
            'customer_id' => auth()->user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'total' => $request->totalAmount,
            'order_code' => rand(1000,900000),
            'pay_type' => $request->payType,
        ])->id;

        // order details 
        $carts = session()->get('cart');
        if ($carts) {
            foreach ($carts as $cart)
            orderDetails::create([
                    'order_id' => $orderId,
                    'product_id' => $cart['product_id'],
                    'product_name' => $cart['product_name'],
                    'model' => $cart['product_model'],
                    'price' => $cart['regular_price'],
                    'offer' => $cart['product_offer'],
                    'quantity' => $cart['product_quantity'],
                    'total' => ($cart['regular_price'] * $cart['product_quantity']) - ($cart['product_offer'] * $cart['product_quantity']),
                ]);
            session()->forget('cart');
            return redirect()->route('user.view.my.cart')->with('message', 'Order place successfully.');
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
            $cartExist[$id]['product_quantity'] = $cartExist[$id]['product_quantity'] + $request->quantity;
            session()->put('cart', $cartExist);
            return redirect()->back()->with('message', 'Product added into the cart');
        }
    }
}