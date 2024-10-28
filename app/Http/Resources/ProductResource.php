<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return 
        [
            'name' => $this->name,
            'brand' => $this->brand,
            'description' => $this->description,
            'price' => $this->price,
            'amount' => $this->amount,
            'image_path' => $this->image_path,
            'availability' => $this->availability,
            'categories' => CategoryResource::collection($this->categories),
            'created_at' => $this->created_at,

        ];
    }
}
