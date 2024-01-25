<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToursRequest extends FormRequest
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
        'budget_head'  => 'required|regex:/^[\pL\s\- \/\., _ 0-9]+$/u|max:150',
        'tour_purpose' => 'required|regex:/^[\pL\s\- \/\., _ 0-9]+$/u|max:250',
        'journey_mode' => 'required|regex:/^[\pL\s\- ; _ 0-9]+$/u|max:50',
        'journey_class' => 'required|regex:/^[\pL\s\- ; _ 0-9]+$/u|max:50',
        'tada_advance'  => 'required|regex:/^[\pL\s\- ; _ 0-9]+$/u|max:50',
        
        'dep_station' => 'required|regex:/^[\pL\s\-  _ 0-9]+$/u|max:75',
        'dep_station_date' => 'required|date_format:Y-m-d',
        'dep_station_time' => 'required|date_format:H:i',
        
        'destination' => 'required|regex:/^[\pL\s\- ; _ 0-9]+$/u|max:75',
        'dest_arr_date' => 'required|date_format:Y-m-d',
        'dest_arr_time' => 'required|date_format:H:i',
        
        'rj_station' => 'required|regex:/^[\pL\s\- ; _ 0-9]+$/u|max:75',
        'rj_station_date' => 'required|date_format:Y-m-d',
        'rj_station_time' => 'required|date_format:H:i',
        
        'rj_origin'  => 'required|regex:/^[\pL\s\- ; _ 0-9]+$/u|max:75',
        'rj_origin_arr_date' => 'required|date_format:Y-m-d',
        'rj_origin_arr_time' => 'required|date_format:H:i',
      ];
    }
}
