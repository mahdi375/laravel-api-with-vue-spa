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
            ->filter($filters)
            ->with([
                'prices' => function($q) use ($filters) {
                    $q->when(
                        $filters['min_price'] ?? false,
                        fn($q, $min_price) => $q->where('prices.price', '>=', $min_price)
                    );

                    $q->when(
                        $filters['max_price'] ?? false,
                        fn($q, $max_price) => $q->where('prices.price', '<=', $max_price)
                    ); 

                    $q->whereHas('color', function ($q) use ($filters) {
                        $q->when(
                            $filters['colors'] ?? false,
                            fn($q, $colors) => $q->whereIn('name', explode(',', $colors))
                        );
                    });
                }, 
                'prices.color'
            ])
            ->paginate()
            ->withQueryString();
        
        $colors = Color::all();

        return view('product::index', ['products' => $products, 'colors' => $colors]);
    }
}