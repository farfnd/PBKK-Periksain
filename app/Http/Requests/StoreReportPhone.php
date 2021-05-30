<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportPhone extends FormRequest
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
            'nama_terlapor' => 'required',
            'kontak_pelaku' => 'required',
            'kronologi' => 'required',
            'total_kerugian' => 'required'
        ];
    }

    public function message()
    {
        return[
            'nama_terlapor.required' => 'nama terlapor masih kosong',
            'kontak_pelaku.required' => 'kontak pelaku masih kosong',
            'kronologi.required' => 'mohon isi kronologi kejadian',
            'total_kerugian.required' => 'isi total kergian yang dialami'
        ]
    }
}
