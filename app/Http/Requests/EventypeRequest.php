<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventypeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
			'conditions' =>'required|min:3|max:25',
			'eventname'  =>'required|regex:/^[\pL\s\- ;0-9_]+$/u|max:250',
			'eventdate'  =>'required|date_format:"Y-m-d"',
			'description'=>'required|regex:/^[\pL\s\- .,;0-9_]+$/u|max:250'
        ];
    }
}
