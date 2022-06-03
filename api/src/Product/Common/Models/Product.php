<?php

namespace Modules\Product\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Common\Database\Factories\ProductFactory;

class Product extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    static function newFactory()
    {
        return new ProductFactory();
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'prices');
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}