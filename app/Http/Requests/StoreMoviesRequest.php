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
            'user_id' => 'required|integer',
            'name' => 'required|string',
            'age_restriction' => 'required|in:0,10,13,16,18',
            'duration' => 'required|integer',
            'file' => 'required',
            'file_size' => 'required|integer',
            'tag' => 'exists:tags,id',
        ];
    }
}
