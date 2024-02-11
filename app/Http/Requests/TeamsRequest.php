<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamsRequest extends FormRequest
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
          'user_id'       => 'required|numeric|min:1',
          'existing_name' => 'required_without:new_team_name',
          'new_team_name' => 'required_without:existing_name',
          'role' => 'required|min:1',
        ];
        
        $messages = [
            'user_id.required' => 'Must select one name',
            'user_id.numeric' => 'Must Select One Name',
            
            'existing_name.required_without' => 'Must Select Existing Name or Enter New',
            
            'new_team_name.required_without' => 'Must Enter New Name or Select Existing Name',
            
            'role.required' => 'Must select one role',
            'role.numeric' => 'Must Select one Role',
            'role.min' => 'Must Select one Role',
        ];

    }
}
