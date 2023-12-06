<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreMoviesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //! default false
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:2|max:60',
            'age_restriction' => 'required|integer|digits_between:0,18',
            //'file' => 'required|file|extensions:mp4,avi,flv,wmv,mov,rmvb,mpeg,mkv'
            'tag' => 'exists:tags,id'
        ];
    }
}
