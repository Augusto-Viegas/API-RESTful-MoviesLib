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
        //return parent::toArray($request);
        return [
            'name' => $this->name,
            'age_restriction' => $this->age_restriction,
            'duration' => $this->duration,
            'file' => $this->file,
            'file_size' => $this->file_size,
            'tag' => $this->tag,
        ];
    }
}
