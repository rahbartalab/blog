<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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
            'name' => [
                'required', 'string', 'min:3', 'max:255',
                Rule::unique('roles', 'name')->ignore($this->route()->role)
            ],
            /* --!> we want array of integer (permissions id) <!-- */
            'permissions' => ['required', 'array'],
            'permissions.*' => ['int ', 'exists:permissions,id']
        ];
    }
}
