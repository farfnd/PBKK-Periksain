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
            'bank' => 'required',
            'nomor_rekening' => 'required',
            'platform' => 'required',
            'kontak_pelaku' => 'required',
            'kronologi' => 'required',
            'total_kerugian' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'nama_terlapor.required' => 'Nama terlapor wajib diisi.',
            'bank.required' => 'Bank wajib diisi.',
            'nomor_rekening.required' => 'Nomor rekening wajib diisi.',
            'platform.required' => 'Platform penipuan wajib diisi.',
            'kontak_pelaku.required' => 'Kontak pelaku wajib diisi.',
            'kronologi.required' => 'Kronologi kejadian wajib diisi.',
            'total_kerugian.required' => 'Total kerugian wajib diisi.',
        ];
    }
}
