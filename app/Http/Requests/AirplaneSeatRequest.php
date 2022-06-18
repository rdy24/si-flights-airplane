<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AirplaneSeatRequest extends FormRequest
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
            'plane_id' => 'required',
            'kelas_kursi' => 'required',
            'kuota' => 'required|integer',
            'harga' => 'required|integer',
        ];
    }
}
