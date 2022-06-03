<?php

namespace Modules\Product\Frontend\Models;

use Modules\Product\Common\Models\Price as Model;

class Price extends Model
{
    protected $with = ['color'];
}