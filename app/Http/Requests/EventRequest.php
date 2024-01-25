<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
			'event_type'  => 'required|numeric|max:20',
			'start_date'  => 'required|date_format:Y-m-d',
			'start_time'  => 'required|date_format:H:i',
			'end_date'    => 'required|date_format:Y-m-d',
			'end_time'    => 'required|date_format:H:i',
			'event_venue' => 'required|regex:/^[\pL\s\-., ]+$/u|max:100',
			'conditions'   => 'required|alpha|max:20',
			//'council'     => 'sometimes|nullable|regex:/^[\pL\s\-.,;: 0-9_]+$/u|max:50',
			'comment'     => 'sometimes|nullable|regex:/^[\pL\s\-., _0-9]+$/u|max:250'
        ];
    }
}
