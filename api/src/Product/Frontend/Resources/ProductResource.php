<?php

namespace Modules\Product\Frontend\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "type" => "products",
            "id" => (string) $this->id,

            "attributes" => [
                "name" => $this->name,
                "description" => $this->description,
            ],

            "relationships" => [
                "prices" => PriceResource::collection($this->prices)
            ],
        ];
    }
}