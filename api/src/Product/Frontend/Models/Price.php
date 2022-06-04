<?php

namespace Modules\Product\Frontend\Models;

use Modules\Product\Common\Models\Price as Model;

class Price extends Model
{
    protected $with = ['color'];
        
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeColor($query, $filters)
    {
        if (!isset($filters['colors'])) return;

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