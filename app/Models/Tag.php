<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;
   public $timestamps = false;
    protected $fillable = [
        'category'
    ];

    public function movie(): BelongsToMany
    {
        //N:N (N tags are in N movies)
        return $this->belongsToMany(Movie::class, 'move_tag');
    }
}
