<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\product;
use App\Models\Review;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $Result1 = category::all();
       $Result2 = product::all();
       $Result3= Review::all();
        //dd($Result);
        return view('Home.Index', ['category' => $Result1,'product'=> $Result2,'Review'=> $Result3]);
    }

}
