<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "order" => [
                'id' => $this->id,
                'total_price' => $this->total_price,
                'created_at' => $this->created_at,
                'product' => new ProductResource($this->product),
                'user' => new UserResource($this->user),
            ]
        ];
    }
}
