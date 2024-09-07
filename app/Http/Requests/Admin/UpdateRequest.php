<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        // Lấy ID từ request thay vì từ route
        $userId = $this->input('id');

        return [
            'username' => 'required|string|max:255|unique:users,username,' . $userId,
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $userId,
            'phone' => 'required|string|max:20',
            'role' => 'required|string|in:user,admin',
            'password' => 'nullable|string|min:6',
        ];
    }
}
