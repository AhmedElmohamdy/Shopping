<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Index()
    {
      if(Auth::check())
      {

    // Products grouped by category
  
         return view('Admin.Home.Index', [
        'totalUsers' => User::count(),
        'totalOrders' => Order::count(),
        'totalProducts' => Product::count(),
        'totalCategory' => Category::count(),
        'totalSales' => Order::sum('total'),
        'recentOrders' => Order::with('user')->latest()->get(),
    ]);
      }
        else
        {
          return redirect()->route('login');
        }
     }

  
}

