<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    //protected $table = "movies";
    protected $fillable = [
        'user_id',
        'name',
        'age_restriction',
        'length_in_minutes',
        'file',
        'file_size',
    ];

    public function rules()
    {
        /*return
        [
            'name' => 'required|min:2|max:60',
            'age_restriction' => 'required|integer|digits_between:0,20',
            'file' => 'required|file|mimes:mp4,avi,flv,wmv,mov,rmvb,mpeg,mkv'
        ];*/
    }

    public function users()
    {
        //1:N
        return $this->belongsTo(\App\Models\User::class);

    }

    public function tags()
    {
        //N:N
        return $this->belongsToMany(Tag::class);
    }
}
