<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    // GET /api/products
    public function index()
    {
        $products = Product::with('category')->get();
        return response()->json([
            'status' => true,
            'message' => 'All products retrieved successfully',
            'data' => $products
        ], 200);
    }

    // GET /api/products/{id}
    public function show($id)
    {
        $product = Product::with('category')->find($id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Product details retrieved successfully',
            'data' => $product
        ], 200);
    }

    // POST /api/products
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|integer',
            'description' => 'required|string',
            'cat_id' => 'required|exists:categories,id',
            'ProdactNameAr' => 'required|string|max:255',
            'DescriptionAr' => 'required|string',
            'image_name' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->all();

        if ($request->hasFile('image_name')) {
            $imageName = time() . '.' . $request->image_name->extension();
            $request->image_name->move(public_path('uploads/products'), $imageName);
            $data['image_name'] = 'uploads/products/' . $imageName; // store relative path in DB
        }

        $product = Product::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Product created successfully',
            'data' => $product
        ], 201);
    }

    // PUT /api/products/{id}
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found',
                'data' => null
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'product_name' => 'sometimes|string|max:255',
            'product_price' => 'sometimes|numeric',
            'product_quantity' => 'sometimes|integer',
            'description' => 'sometimes|string',
            'cat_id' => 'sometimes|exists:categories,id',
            'ProdactNameAr' => 'sometimes|string|max:255',
            'DescriptionAr' => 'sometimes|string',
            'image_name' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->all();

        if ($request->hasFile('image_name')) {
            $imageName = time() . '.' . $request->image_name->extension();
            $request->image_name->move(public_path('uploads/products'), $imageName);
            $data['image_name'] = 'uploads/products/' . $imageName; // store relative path in DB
        }

        $product->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Product updated successfully',
            'data' => $product
        ], 200);
    }

    // DELETE /api/products/{id}
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found',
                'data' => null
            ], 404);
        }

        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Product deleted successfully',
            'data' => null
        ], 200);
    }
}
