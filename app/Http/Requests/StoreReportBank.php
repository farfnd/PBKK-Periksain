<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportBank extends FormRequest
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
            'nomor_rekening' => 'required',
            'kontak_pelaku' => 'required',
            'kronologi' => 'required',
            'total_kerugian' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'nama_terlapor.required' => 'nama pemilik harus di isi.',
            'nomor_rekening.required' => 'mohon isi nomor rekening',
            'kontak_pelaku.required' => 'mohon isi kontak pelaku',
            'kronologi.required' => 'tliskan kronologi kejadian',
            'total_kerugian.required' => 'isi total kerugian'
        ]
    }
}
