<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestBotRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (
            $this->request->has('_key') &&
            $this->request->get('_key') === config('services.testbot_private_key')
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vk_id' => 'required',
            'success' => 'required|numeric',
            'task' => 'required|in:100,101,102,103' // TODO:
        ];
    }
}
