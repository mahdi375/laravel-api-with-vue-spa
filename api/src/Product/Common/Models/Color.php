<?php

namespace Modules\Product\Common\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $guarded = ['id'];
 
    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}