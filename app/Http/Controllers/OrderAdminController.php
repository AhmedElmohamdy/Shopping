<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderAdminController extends Controller
{
      public function GetAllOrders()
    {
        $orders = Order::latest()->get();
        return view('Admin.orders.List', compact('orders'));
    }

    public function GetOrderDetails($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('Admin.orders.Details', compact('order'));
    }
    


    public function DeleteOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->items()->delete(); // Delete associated order items
        $order->delete(); // Delete the order itself
        return redirect()->route('Admin.Orders.List')->with('success', 'Order deleted successfully.');
    }
}
