<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPassword extends FormRequest
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
            'password_validation' => 'required|min:8',
            'new_password' => 'required|min:8',
            'confirm_new_password' => 'required|same:new_password',
            
        ];
    }

    public function messages()
    {
        return [
            'password_validation.required' => 'Password lama wajib diisi.',
            'password_validation.min' => 'Password lama minimal diisi dengan 8 karakter.',
            'new_password.required' => 'Password baru wajib diisi.',
            'new_password.min' => 'Password baru minimal diisi dengan 8 karakter.',
            'confirm_new_password.required' => 'Konfirmasi Password baru wajib diisi.',
            'confirm_new_password.same' => 'Konfirmasi password baru tidak sama.',
        ];
    }
}
