<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('color_id')->constrained('colors')->restrictOnDelete()->cascadeOnUpdate();
            $table->decimal('price');
            $table->timestamps();
        });


    }



    public function down()
    {
        Schema::dropIfExists('prices');
    }
};
