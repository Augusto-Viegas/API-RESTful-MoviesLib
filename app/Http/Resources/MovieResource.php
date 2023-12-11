<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'id' => $this->id,
            'email' => UserResource::collection($this->whenLoaded('users')),
            'name' => $this->name,
            'age_restriction' => $this->age_restriction,
            'duration' => $this->duration,
            'file' => $this->file,
            'file_size' => $this->file_size,
            'tags' => TagResource::collection($this->whenLoaded('tags')),
        ];
    }
}
