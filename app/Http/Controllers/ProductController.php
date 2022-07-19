<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductSingleResource;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index', 'show');
    }

    public function index()
    {
        return ProductResource::collection(Product::paginate(15));
    }

    public function store(ProductRequest $request)
    {
        $this->authorize('if_moderator');
        $product = Product::create($request->toArray());

        return response()->json([
            'message' => 'Product created successfully',
            'data'    => new ProductSingleResource($product),
        ]);
    }

    public function show(Product $product)
    {
        return new ProductSingleResource($product);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->authorize('if_admin');
        $attributes         = $request->toArray();
        $attributes['slug'] = strtolower(Str::slug($request->name . '-' . Str::random(5)));

        // $product->update($request->toArray());
        $product->update($attributes);

        return response()->json([
            'message' => 'Product updated successfully',
            'data'    => new ProductSingleResource($product),
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
