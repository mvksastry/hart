<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjeditRequest extends FormRequest
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
        /*
        //'title'          => 'required|regex:/^[\pL\s\- .,;0-9_]+$/u|max:250',
        'description'    => 'nullable|regex:/^[\pL\s\- .,;0-9_-]+$/u|max:250',
        'status'         => 'required|min:1|max:25',
        'agency'         => 'required|regex:/^[\pL\s\- .,;0-9_]+$/u|max:250',
        'project_leader'      => 'required|numeric',
        'est_proj_time'     => 'required|numeric',
        'spent_budget'   => 'required|numeric',
        'comments'       => 'required|regex:/^[\pL\s\- .,;0-9_]+$/u|max:250',
        'start_date'     => 'required|date_format:"Y-m-d"',
        'end_date'       => 'required|date_format:"Y-m-d"|after:start_date',
        */  
      ];
    }
}
