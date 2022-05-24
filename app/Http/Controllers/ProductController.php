<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductSingleResource;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::paginate(15));
    }

    public function store(ProductRequest $request)
    {
        if ($request->price < 10000) {
            throw ValidationException::withMessages([
                'price' => ['The price must be greater than 10000'],
            ]);
        }

        $product = Product::create($request->all());

        return response()->json([
            'message' => 'Product created successfully',
            'product' => new ProductSingleResource($product),
        ]);
    }

    public function show(Product $product)
    {
        return new ProductSingleResource($product);
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
