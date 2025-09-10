<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;


class CartController extends Controller
{
   public function index()
{
    $cart = session()->get('cart', []);

    // Ensure it's an array
    if (!is_array($cart)) {
        $cart = [];
    }

    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    return view('Carts.index', compact('cart', 'total'));
}


    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

    $cart = session()->get('cart', []);

    if(isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            "name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->product_price,
            "image" => $product->image_name
        ];
    }

    session()->put('cart', $cart);
        return redirect()->route('Cart.Index');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Product removed from cart.');
    }
    
 

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
    
        foreach ($request->quantity as $id => $qty) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = (int) $qty;
            }
        }
    
        session()->put('cart', $cart);
    
        return redirect()->route('Cart.Index')->with('success', 'Cart updated successfully.');
    }
    

}
