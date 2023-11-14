<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoviesLib extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'age_restriction',
        'length_in_seconds',
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

    public function usuario()
    {
        //1 filme pertence a 1 usuário
        //return $this->belongsTo(\App\Models\User::class);
    }
}
