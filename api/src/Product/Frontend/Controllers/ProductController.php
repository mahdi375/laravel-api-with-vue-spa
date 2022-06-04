<?php

namespace Modules\Product\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Modules\Product\Frontend\Models\Color;
use Modules\Product\Frontend\Models\Product;
use Modules\Product\Frontend\Resources\ColorResource;
use Modules\Product\Frontend\Resources\ProductResource;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::with('prices')->get();
        $filters = request()->only(['name', 'colors', 'min_price', 'max_price']);

        $products = Product::query()
            ->search($filters)
            ->filter($filters)
            ->with([
                'prices' => fn($q) => $q->price($filters)->color($filters),
                'prices.color'
            ])
            ->paginate()
            ->withQueryString();

        return ProductResource::collection($products);
    }

    public function colors()
    {
        return ColorResource::collection(Color::all());
    }
}