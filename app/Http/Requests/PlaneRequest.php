<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaneRequest extends FormRequest
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
            'airline_id' => 'required',
            'nama' => 'required|string|max:50',
            'tanggal_pembuatan' => 'required|date',
            'tanggal_operasional' => 'required|date',
            'tanggal_kadaluarsa' => 'required|date',
            'status' => 'required',
            'kuota' => 'required|integer',
        ];
    }
}
