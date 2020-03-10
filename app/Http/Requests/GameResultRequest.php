<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameResultRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return md5(md5(auth()->user()->balance->max_points) . $this->request->get('points'))
            === $this->request->get('_h');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            '_h' => 'required',
            'points' => 'required|numeric'
        ];
    }
}
