<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Movie;
use App\Models\Tag;

class TagMovieCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'name' => $this->name,
            'age_restriction' => $this->age_restriction,
            'duration' => $this->duration,
            'file' => $this->file,
            'file_size' => $this->file_size,
            'tag' => TagResource::make($this->whenLoaded('tags')),
        ];
    }

}
