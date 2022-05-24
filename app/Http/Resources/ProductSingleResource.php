<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductSingleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'           => $this->id,
            'name'         => $this->name,
            'slug'         => $this->slug,
            'price'        => number_format($this->price, 0, '.', '.'),
            'actual_price' => $this->price,
            'description'  => $this->description,
            'created'      => $this->created_at->format('d M Y'),
            'updated'      => $this->updated_at->format('d M Y'),
        ];
    }
}
