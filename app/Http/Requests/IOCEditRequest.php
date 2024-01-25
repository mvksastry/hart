<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IOCEditRequest extends FormRequest
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
        return [
          //'subject' =>    'regex:/^[\pL\s\- .,;0-9_]+$/u|max:250',
          //'description'=> '',
        ];
    }
		
		/**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
      return [

        'subject.min:1' => 'Subject Not Selected!',

        'description.required' => 'Description not entered!'
      ];
    }
}
