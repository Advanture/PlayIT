<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CharacterCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body' => 'required|numeric',
            'shirt' => 'required|numeric',
            'pants' => 'required|numeric',
            'hair' => 'required|numeric',
            'eyes' => 'required|numeric',
            'hat' => 'required|numeric',
        ];
    }
}
