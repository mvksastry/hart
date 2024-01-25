<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HolidayRequest extends FormRequest
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
        'holiday_name'=>'required|regex:/^[\pL\s\- ;0-9_]+$/u|max:250',
        'holiday_date'=>'required|date_format:Y-m-d',
        'holiday_type'=>'required|min:2|max:20'
      ];
    }
}
