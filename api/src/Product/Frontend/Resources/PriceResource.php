<?php

namespace Modules\Product\Frontend\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PriceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "type" => "prices",
            "id" => (string) $this->id,
            "attributes" => [
                "price" => $this->price,

                "color" => [
                    "name" => $this->color->name,
                    "hex" => $this->color->hex,
                ],
            ],
        ];
    }
}