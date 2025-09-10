<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Container\Attributes\Auth;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $items = Cart::with('product')->where('user_id', $userId)->get();

        return response()->json([
            'cart' => $items
        ]);
    }

    // Add item to cart
 public function add(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity'   => 'required|integer|min:1',
    ]);
    $userId = auth()->id(); // 
    // Get product info from DB
    $product = Product::findOrFail($request->product_id);
    $item = Cart::where('user_id', $userId)
        ->where('product_id', $product->id)
        ->first();
        
    if ($item) {
        $item->increment('quantity', $request->quantity);
    } else {
        $item = Cart::create([
            'user_id'    => $userId,
            'product_id' => $product->id,
            'quantity'   => $request->quantity,
            'name'       => $product->product_name,
            'price'      => $product->product_price,
            'image'      => $product->image_name,
        ]);
    }
    return response()->json([
        'message' => 'Product added to cart',
        'item'    => $item
    ]);
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $item = Cart::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $item->update(['quantity' => $request->quantity]);

        return response()->json(['message' => 'Cart updated', 'item' => $item]);
    }

    public function destroy($id)
    {
        $item = Cart::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $item->delete();

        return response()->json(['message' => 'Item removed']);
    }
}
