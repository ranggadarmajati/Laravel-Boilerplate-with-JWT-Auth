<?php

namespace App\Http\Requests\api\v1\int\auth;

use App\Http\Requests\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        $message = [
            'email.email' => 'Email tidak Valid ex:abcd@domain.com',
            'email.required' => 'Email wajib diisi!',
            'password.required' => 'Password Wajib diisi!',
            'password.min' => 'Password minimal 6 karakter atau lebih!'
        ];
        return $message;
    }
}
