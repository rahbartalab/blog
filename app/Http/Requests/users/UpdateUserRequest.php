<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'min:3', 'max:255'],
            'last_name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'min:3', 'max:255',
                Rule::unique('users')->ignore(request()->route()->user)
            ],
            'password' => ['nullable','same:password_confirmation', 'required_with:password_confirmation', 'min:6'],
            'password_confirmation' => ['nullable','min:6'],
            'role' => ['nullable', 'int', 'exists:roles,id']
        ];
    }
}
