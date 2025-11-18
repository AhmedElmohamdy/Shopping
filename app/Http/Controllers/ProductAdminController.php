<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Category;
use Illuminate\Validation\Rule;

class ProductAdminController extends Controller
{
    public function ListProduct()
    {
        $Result = product::with('category')->get();
        $Result1 = Category::all();
        //dd($Result);
        return view('Admin.Product.List', ['Product' => $Result, 'category' => $Result1]);
    }



    //Edit
    public function Edit($id = null)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('Admin.Product.Update', compact('product', 'categories'));
    }



    //Add New Product
    public function AddNewProduct()
    {
        $categories = Category::all();
        return view('Admin.Product.AddNew', ['SelectCat' => $categories]);
        //dd($Result);
    }

    //Save New Product
    public function Save(Request $request)
    {
        $request->validate([
            'product_name' => [
                'required',
                'max:30',
                Rule::unique('products', 'product_name')->ignore($request->id)
            ],
            'ProdactNameAr' => 'required|max:30',
            'DescriptionAr' => 'required|max:255',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|numeric',
            'image_name' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'cat_id' => 'required',
        ]);

        //Update product State
        if ($request->id) {
            // dd($request->all());
            $CurrentProduct = Product::find($request->id);
            $CurrentProduct->product_name = $request->product_name;
            $CurrentProduct->ProdactNameAr = $request->ProdactNameAr;
            $CurrentProduct->DescriptionAr = $request->DescriptionAr;
            $CurrentProduct->product_price = $request->product_price;
            $CurrentProduct->product_quantity = $request->product_quantity;
            $CurrentProduct->cat_id = $request->cat_id;
            $CurrentProduct->description = $request->description;
            if ($request->hasFile('image_name')) {
                $image = $request->file('image_name');
                // Generate a unique filename
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                // Move the image to public/assets/img/products/
                $image->move(public_path('Uploads/products/'), $imageName);
                // Store the image path (relative to public folder)
                $imagePath = 'Uploads/products/' . $imageName;
                $CurrentProduct->image_name = $imagePath;
            }
            $CurrentProduct->Save();
            return redirect()->route('Admin.GetProduct')->with('success', 'Product Updated Successfully!');
        }

        //Save product State
        else {
            $imagePath = '';
            // Check if an image is uploaded
            if ($request->hasFile('image_name')) {
                $image = $request->file('image_name');

                // Generate a unique filename
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                // Move the image to public/assets/img/products/
                $image->move(public_path('Uploads/products/'), $imageName);

                // Store the image path (relative to public folder)
                $imagePath = 'Uploads/products/' . $imageName;
            }

            $NewProduct = new product();
            $NewProduct->product_name = $request->product_name;
            $NewProduct->ProdactNameAr = $request->ProdactNameAr;
            $NewProduct->DescriptionAr = $request->DescriptionAr;
            $NewProduct->product_price = $request->product_price;
            $NewProduct->product_quantity = $request->product_quantity;
            $NewProduct->image_name = $imagePath;
            $NewProduct->cat_id = $request->cat_id;
            $NewProduct->description = $request->description;
            $NewProduct->save();

            return redirect()->route('Admin.GetProduct')->with('success', 'Product added successfully!');
            //dd($Result);
        }
    }

    public function Delete($Pro_Id = null)
    {
        $CurrentProduct = Product::findOrFail($Pro_Id);
        $CurrentProduct->delete();
        return redirect()->route(route: 'Admin.GetProduct', parameters: $Pro_Id);
    }
}
