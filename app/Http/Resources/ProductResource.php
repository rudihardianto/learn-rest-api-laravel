<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'           => $this->id,
            'name'         => $this->name,
            'slug'         => $this->slug,
            'price'        => number_format($this->price, 0, '.', '.'),
            'actual_price' => $this->price,
            'category'     => [
                'id'   => $this->category->id,
                'name' => $this->category->name,
                'slug' => $this->category->slug,
            ],
            'created'      => $this->created_at->format('d M Y'),
            'updated'      => $this->updated_at->format('d M Y'),
        ];
    }
}