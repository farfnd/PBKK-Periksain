<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDisclaimer extends FormRequest
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
                'id_laporan' => 'required|exists:reports,id',
                'sanggahan' => 'required',
            ];
    }

    public function messages()
    {
        return [
            'id_laporan.exists' => 'ID laporan tidak ditemukan.',
            'id_laporan.required' => 'ID laporan wajib diisi.',
            'sanggahan.required' => 'Deskripsi sanggahan wajib diisi.',
        ];
    }
}
