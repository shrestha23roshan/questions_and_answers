<?php

namespace Modules\Answers\Http\Requests\Answers;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'body.required' => 'Answer field is required.',
        ];
    }
}