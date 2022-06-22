<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'postMessage' => ['required']
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'postMessage.required' => '投稿メッセージは必ず入力してください。'
        ];
    }
}
