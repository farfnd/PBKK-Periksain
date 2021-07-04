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
                'file_bukti' => 'required',
                'file_bukti.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            ];
    }

    public function messages()
    {
        return [
            'id_laporan.exists' => 'ID laporan tidak ditemukan.',
            'id_laporan.required' => 'ID laporan wajib diisi.',
            'sanggahan.required' => 'Deskripsi sanggahan wajib diisi.',
            'file_bukti.required' => 'File bukti sanggahan wajib diisi.',
            'file_bukti.*.image' => 'File bukti sanggahan wajib berupa gambar.',
            'file_bukti.*.mimes' => 'File bukti sanggahan wajib berupa gambar.',
            'file_bukti.*.max' => 'File bukti sanggahan harus berukuran maksimal 2 MB.',
        ];
    }
}
