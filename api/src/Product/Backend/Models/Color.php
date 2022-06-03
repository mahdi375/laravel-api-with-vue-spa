<?php

namespace Modules\Product\Backend\Models;

use Modules\Product\Common\Models\Color as Model;

class Color extends Model
{
    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function scopeColors($query, array $colors = null)
    {
        $query->when(
            $colors ?? false,
            fn($query, $colors) => $query->whereIn('name', $colors)
        );
    }
}