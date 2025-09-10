<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{

public function index()
{
    $cart = session()->get('cart', []);
    $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
    
    return view('checkout.index', compact('cart', 'total'));
}

public function store(Request $request)
{
    
    $cart = session('cart', []);

    if (empty($cart)) {
        return redirect()->back()->with('error', 'Your cart is empty.');
    }

    $validated = $request->validate([
        'full_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
        'city' => 'required',
        'country' => 'required',
    ]);

    $order = Order::create([
        'user_id' => Auth::id(),
        'full_name' => $validated['full_name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'address' => $validated['address'],
        'city' => $validated['city'],
        'country' => $validated['country'],
        'total' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
    ]);

    foreach ($cart as $productId => $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $productId,
            'quantity' => $item['quantity'],
            'price' => $item['price'],
        ]);
    }

    session()->forget('cart');

    return redirect()->route('checkout.success')->with('success', 'Order placed successfully.');
}

public function success()
{
    return view('order.success');
}


}