<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\category;
class CategoryController extends Controller
{
// All Category by id
public function GetAllCategoriesAction()
    {
    $Result = category::all();
    return view('/Categories.Category', ['category' => $Result]);
     //$Result=category::latest()->take(2)->get();
    }
    
 // Get Category by id
 public function GetCategoryByIdAction($CatId)
{
    //$Result = DB::table('categories')->where('Category_Id', $CatId)->get();
    $Result=category::where('id', $CatId)->get();
    return  $Result;
}

}
