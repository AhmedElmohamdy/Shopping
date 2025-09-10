<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;

class ProductImgsController extends Controller
{

    public function GetAllProductImage()
    {
        $Products = ProductImage::with('product')->get();
        return view('Admin.AddImages.List', compact('Products'));
    }

    public function EditProductImage($id= null)
    {
        $product = Product::all();
        $productImage = ProductImage::findOrFail($id);

        return view('Admin.AddImages.Update', compact('productImage', 'product'));
    }

    //Add Image
    public function AddImageForm()
    {
        $products = Product::all();
        return view('Admin.AddImages.AddProductImage', compact('products'));
    }
    //Save Image
    public function SaveImage( Request $request)
    {
        $request->validate([
            'image_Name' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'product_id' => 'required',
        ]);

           if ($request->id) {
            // dd($request->all());
            $CurrentProductImg = ProductImage::find($request->id);
            $CurrentProductImg->product_id = $request->product_id;
            
            if ($request->hasFile('image_Name')) {
                $image = $request->file('image_Name');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('Uploads/productImgs/'), $imageName);
                // Store the image path (relative to public folder)
                $imagePath = 'Uploads/productImgs/' . $imageName;
                $CurrentProductImg->image_Name = $imagePath;
            }
            $CurrentProductImg->Save();
            return redirect()->route('Admin.GetProductImage')->with('success', 'ProductImg Updated Successfully!');
        }
         else {
            $imagePath ='';
            // Check if an image is uploaded
            if ($request->hasFile('image_Name')) {
                $image = $request->file('image_Name');

                // Generate a unique filename
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                // Move the image to public/assets/img/products/
                $image->move(public_path('Uploads/productImgs/'), $imageName);

                // Store the image path (relative to public folder)
                $imagePath = 'Uploads/productImgs/' . $imageName;
            } 

            $NewProductImg = new ProductImage();
           
            $NewProductImg->image_Name = $imagePath;
            $NewProductImg->product_id = $request->product_id;
            $NewProductImg->save();

            return redirect()->route('Admin.GetProductImage')->with('success', 'ProductImg added successfully!');
            //dd($Result);
        }
    }

    public function DeleteProductImage($id = null)
    {
        $productImage = ProductImage::findOrFail($id);
        $productImage->delete();

      return redirect()->route(route: 'Admin.GetProductImage', parameters: $id);
    }
}
