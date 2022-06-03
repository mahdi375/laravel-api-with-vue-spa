<?php

namespace Modules\Product\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Modules\Product\Frontend\Models\Color;
use Modules\Product\Frontend\Models\Product;
use Modules\Product\Frontend\Resources\ProductResource;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('prices')->get();

        return ProductResource::collection($products);
    }
}