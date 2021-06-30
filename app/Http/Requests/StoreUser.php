<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUser extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required|min:8|',
            'password_confirmation' => 'required|min:8|same:password',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Nama depan wajib diisi.',
            'last_name.required' => 'Nama belakang wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal diisi dengan 8 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'role.required' => 'Peran pengguna wajib diisi.',
            'password_confirmation.same' => 'Password konfirmasi tidak sama.',
            'password_confirmation.required' => 'Password konfirmasi wajib diisi'
        ];
    }
}
