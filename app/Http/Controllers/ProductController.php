<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductSingleResource;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::paginate(15));
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->toArray());

        return response()->json([
            'message' => 'Product created successfully',
            'product' => new ProductSingleResource($product),
        ]);
    }

    public function show(Product $product)
    {
        return new ProductSingleResource($product);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $attributes         = $request->toArray();
        $attributes['slug'] = strtolower(Str::slug($request->name . '-' . Str::random(5)));

        // $product->update($request->toArray());
        $product->update($attributes);

        return response()->json([
            'message' => 'Product updated successfully',
            'product' => new ProductSingleResource($product),
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully',
        ]);
    }
}
