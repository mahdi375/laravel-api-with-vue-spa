<?php

namespace Modules\Product\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Product\Common\Models\Color;
use Modules\Product\Common\Models\Price;
use Modules\Product\Common\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = Product::factory(30)->create();

        Color::insert([
            ['name' => 'white', 'hex' => '#ffffff'],
            ['name' => 'gray', 'hex' => '#808080'],
            ['name' => 'black', 'hex' => '#000000'],

            ['name' => 'red', 'hex' => '#ff0000'],
            ['name' => 'yellow', 'hex' => '#ffff00'],

            ['name' => 'green', 'hex' => '#008000'],
            ['name' => 'blue', 'hex' => '#0000ff'],
        ]);

        $products->each(function($product) {
            Price::create(['product_id' => $product->id, 'color_id' => rand(1, 3), 'price' => rand(15, 25)]);

            if(rand(0, 1)) {
                Price::create(['product_id' => $product->id, 'color_id' => rand(4, 5), 'price' => rand(15, 25)]);
            }

            if(rand(0, 1)) {
                Price::create(['product_id' => $product->id, 'color_id' => rand(6, 7), 'price' => rand(15, 25)]);
            }
        });
    }
}