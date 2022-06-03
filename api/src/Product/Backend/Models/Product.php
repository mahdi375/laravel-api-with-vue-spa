<?php

namespace Modules\Product\Backend\Models;

use Modules\Product\Common\Models\Product as Model;

class Product extends Model
{
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['name'] ?? false, fn($q, $name) => $q->where('name', 'like', "%$name%"));

        $query->whereHas('colors', function ($q) use ($filters) {
            $q->when(
                $filters['colors'] ?? false,
                fn($q, $colors) => $q->whereIn('colors.name', explode(',', $colors))
            ); // colors

            $q->when(
                $filters['min_price'] ?? false,
                fn($q, $min_price) => $q->where('prices.price', '>=', $min_price)
            ); // price_min

            $q->when(
                $filters['max_price'] ?? false,
                fn($q, $max_price) => $q->where('prices.price', '<=', $max_price)
            ); // price_max
        });
    }
}