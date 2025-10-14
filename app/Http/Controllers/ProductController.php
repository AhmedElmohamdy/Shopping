<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\Category;
use App\Models\ProductImage;

class ProductController extends Controller
{
    //Get AllProduct , Product By Category Id
    public function GetAllProdectCategoryAction($CatId = null)
    {
        //if you not find ID _> get all data
        if (!$CatId) {
            // Get all products with pagination
            //$Result = Product::cursorPaginate(4);
            $Result = Product::paginate(4);
            //dd($Result);
            return view('/Products.Product', ['Product' => $Result]);
        } else {
            // Get products by category ID
            $Result = product::where('cat_id', $CatId)->paginate(4);
            //dd($Result);
            return view('/Products.Product', ['Product' => $Result]);
        }
    }

    // Get Product Details ..... and get product by id
    public function GetProdectDetailsAction($ProId)
    {

        // $Result = product::with('category')->get();
         $product = Product::with('images', 'category')->findOrFail($ProId);

    

        //related products that in the same category without the current product and in random order
        $Result2 = product::where('cat_id', $product->cat_id)
        ->where('id', '!=', $ProId)
        ->InRandomOrder()
        ->take(4)
        ->get();

return view('Products.ProductDetails', compact('product'), ['RelatedProduct' => $Result2]);
    }


    //Search Icon
    public function search(Request $request)
    {


        // Search in the product name and description
        $Result = Product::where('product_name', 'LIKE', "%{$request->Search}%")->orWhere('description', 'LIKE', "%{$request->Search}%")->paginate(4);

        return view('/Products.Product', ['Product' => $Result]);
    }


    
    
}
