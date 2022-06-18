<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            'plane_id' => 'required',
            'route_id' => 'required',
            'waktu_berangkat' => 'required|date_format:Y-m-d H:i',
            'waktu_tiba' => 'required|date_format:Y-m-d H:i',
            'status' => 'required',
        ];
    }
}
