<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeFormRequest extends FormRequest
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
          
          'gender_id'      => 'required|numeric|min:1|max:4',
          'roles'        => 'required|array|between:1,10',
          'department'     => 'nullable|alpha',
          'birth_date'     => 'required|date_format:Y-m-d',
          'join_date'      => 'required|date_format:Y-m-d',
          'designation'    => 'required|regex:/^[\pL\s\- ;0-9_]+$/u|max:250',
          'level_id'       => 'nullable|numeric|min:1|max:14',
          'basic_pay'      => 'required|numeric',
          'variable_pay'   => 'nullable|numeric',
          'increment_date' => 'nullable|date_format:Y-m-d',
          'office_phone'   => 'required|numeric',
          'mobile_phone1'  => 'required|numeric',
          'mobile_phone2'  => 'nullable|numeric',
          'validity_date'  => 'required|date_format:Y-m-d',
          'address'        => 'required|regex:/^[\pL\s\- ,-;0-9_]+$/u|max:250',
          'photofile'      => 'nullable',
          //'folder_name'    => 'required',
          //'website_link'   => 'required',
          'status'         => 'required|numeric|min:1|max:4',
          //'tds'            => 'required',
          //'suspension'     => 'required|alpha',
        ];
    }
}
