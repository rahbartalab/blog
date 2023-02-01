<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRoleRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:255', Rule::unique('roles', 'name')],
            'permissions' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name' => 'لطفا نام نقش را انتخاب کنید',
            'permissions' => 'برای ساخت یک نقش جدید حداقل یک دسترسی مورد نیاز است'
        ];
    }
}
