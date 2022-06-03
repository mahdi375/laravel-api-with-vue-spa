<?php

namespace Modules\Product\Common\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Common\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    
    public function definition()
    {
        return [
            'name' => $this->faker->words(asText: true),
            'description' => $this->faker->paragraph(),
        ];
    }
}