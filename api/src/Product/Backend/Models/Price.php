<?php

namespace Modules\Product\Backend\Models;

use Modules\Product\Common\Models\Price as Model;

class Price extends Model
{

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function scopeColor($query, $filters)
    {
        $colors = $filters['colors'] ? explode(',', $filters['colors']) : null;

        $query->whereHas('color', fn($q) => $q->colors($colors));
    }

    public function scopePrice($query, $prices)
    {
        $query->when(
            $prices['min_price'] ?? false,
            fn($query, $min_price) => $query->where('prices.price', '>=', $min_price)
        );

        $query->when(
            $prices['max_price'] ?? false,
            fn($query, $max_price) => $query->where('prices.price', '<=', $max_price)
        ); 
    }
}