<?php

namespace App\Http\Requests\api\v1\int\auth;

// use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\FormRequest;

class RegisterRequest1 extends FormRequest
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
            'password' => 'required|confirmed|min:6',
            'role' => 'required|in:1,2,3'
        ];
    }

    public function messages(){

        $message = [
            'first_name.required' => 'Nama Wajib diisi!',
            'last_name.required' => 'Nama Panjang Wajib diisi!',
            'email.email' => 'Email tidak Valid ex:abcd@domain.com',
            'email.required' => 'Email wajib diisi!',
            'email.unique' => 'Email tersebut sudah terpakai!',
            'password.required' => 'Password wajib diisi!',
            'password.confirmed' => 'Password tidak cocok',
            'role.required' => 'Role users harus diisi!',
            'role.in' => 'Role hanya bisa diisi dengan 1.SUper Admin, 2.Admin, dan 3.Maintenance'

        ];
        return $message;
    }
}
