<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->q;

        $products = Product::where('name', 'like', "%{$query}%")->paginate(15);

        return ProductResource::collection($products);
    }
}
