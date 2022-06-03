<?php

namespace Modules\Product\Backend\Models;

use Modules\Product\Common\Models\Product as Model;

class Product extends Model
{
    public function scopeFilter($query, $filters)
    {
        $query->whereHas('prices', fn($q) => $q->price($filters)->color($filters));
    }

    public function scopeSearch($query, $filters)
    {
        $query->when(
            $filters['name'] ?? false,
            fn($q, $name) => $q->where('name', 'like', "%$name%")
        );
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}