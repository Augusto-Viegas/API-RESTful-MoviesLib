<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'category'
    ];

    public function rules()
    {
        return
        [
            'category' => 'required|min:4|max:18'
        ];
    }

    public function movies()
    {
        //N:N
        return $this->belongsToMany(Movie::class);
    }
}
