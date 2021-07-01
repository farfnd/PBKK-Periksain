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
        if($this->method() == 'POST'){
            return [
                'nama_terlapor' => 'required',
                'bank' => 'required',
                'nomor_rekening' => 'required|numeric',
                'platform' => 'required',
                'kontak_pelaku' => 'required',
                'kronologi' => 'required',
                'total_kerugian' => 'required|numeric',
                'file_bukti' => 'required',
                'file_bukti.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            ];
        }
        if($this->method() == 'PUT'){
            return [
                'nama_terlapor' => 'required',
                'bank' => 'required',
                'nomor_rekening' => 'required|numeric',
                'platform' => 'required',
                'kontak_pelaku' => 'required',
                'kronologi' => 'required',
                'total_kerugian' => 'required|numeric',
                'file_bukti' => 'required|sometimes',
                'file_bukti.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            ];
        }
    }

    public function messages()
    {
        return[
            'nama_terlapor.required' => 'Nama terlapor wajib diisi.',
            'bank.required' => 'Bank wajib diisi.',
            'nomor_rekening.required' => 'Nomor rekening wajib diisi.',
            'nomor_rekening.numeric' => 'Nomor rekening wajib berupa angka.',
            'platform.required' => 'Platform penipuan wajib diisi.',
            'kontak_pelaku.required' => 'Kontak pelaku wajib diisi.',
            'kronologi.required' => 'Kronologi kejadian wajib diisi.',
            'total_kerugian.required' => 'Total kerugian wajib diisi.',
            'total_kerugian.numeric' => 'Total kerugian wajib berupa angka.',
            'file_bukti.required' => 'File bukti penipuan wajib diisi.',
            'file_bukti.*.image' => 'File bukti penipuan wajib berupa gambar.',
            'file_bukti.*.mimes' => 'File bukti penipuan wajib berupa gambar.',
            'file_bukti.*.max' => 'File bukti penipuan harus berukuran maksimal 2 MB.',
        ];
    }
}
