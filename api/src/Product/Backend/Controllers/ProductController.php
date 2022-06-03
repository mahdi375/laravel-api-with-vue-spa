<?php

namespace Modules\Product\Backend\Controllers;

use App\Http\Controllers\Controller;
use Modules\Product\Backend\Models\Color;
use Modules\Product\Backend\Models\Product;

class ProductController extends Controller
{
    public function index()
    {

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
        
        $colors = Color::all();

        return view('product::index', ['products' => $products, 'colors' => $colors]);
    }
}