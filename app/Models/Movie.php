<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    use HasFactory;
    //protected $table = "movies";
    protected $fillable = [
        'user_id',
        'name',
        'age_restriction',
        'duration',
        'file',
        'file_size',
    ];

    public function users(): BelongsTo
    {
        //N:1 (1 user has N movies)
        return $this->belongsTo(User::class);

    }

    public function tags(): BelongsToMany
    {
        //N:N (N tags are in N movies)
        return $this->belongsToMany(Tag::class, 'movie_tag');
    }
}
