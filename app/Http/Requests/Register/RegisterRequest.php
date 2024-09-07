<?php

namespace App\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // If you need authorization logic, you can add it here.
        // For now, we'll allow all users to make this request.
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
            'username' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
        ];
    }
}
