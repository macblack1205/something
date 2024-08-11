<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'attributes' => [
                'title' => $this->title,
                'price' => $this->price,
                'description' => $this->description,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'user_first' => $this->user_first,
                'user_last' => $this->user_last,
            ],
            'relationships' => [
                'id' => (string)$this->user->id,
            ],
        ];
    }
}
