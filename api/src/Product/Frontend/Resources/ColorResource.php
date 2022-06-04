<?php

namespace Modules\Product\Frontend\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ColorResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "type" => "colors",
            "id" => (string) $this->id,
            "attributes" => [
                "name" => $this->name,
                "hex" => $this->hex,
            ],
        ];
    }
}