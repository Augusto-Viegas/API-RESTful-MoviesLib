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

    public function rules()
    {
        return
        [
            'category' => 'required|min:4|max:18|unique:tags',
            'tags' => 'exists:tags',
        ];
    }



    public function movie(): BelongsToMany
    {
        //N:N
        return $this->belongsToMany(Movie::class);
    }
}
