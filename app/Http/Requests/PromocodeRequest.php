<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromocodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('promocode.add');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'task' => 'required',
            'count' => 'required|numeric|min:1'
        ];
    }
}
