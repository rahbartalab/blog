<?php

namespace App\Http\Requests\User\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
                Rule::unique('users')->ignore(\Auth::user()->id)
            ],
            'password' => ['required', 'current_password']
        ];
    }

    public function messages()
    {
        return [
            'password' => 'وارد کردن پسوورد صحیح برای ذخیره اطلاعات الزامی است'
        ];
    }
}
