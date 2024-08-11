<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first' => $this->first,
            'last' => $this->last,
            'email' => $this->email,
        ];
    }
}
