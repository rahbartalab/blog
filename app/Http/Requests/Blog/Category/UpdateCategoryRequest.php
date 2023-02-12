<?php

namespace App\Http\Requests\Blog\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
                'bail', 'required', 'string', 'max:255',
                Rule::unique('categories')->ignore(request()->route('category'))
            ],
            'slug' => [
                'bail', 'required', 'string', 'max:255',
                Rule::unique('categories')->ignore(request()->route('category'))],
            'parent_id' => [
                'bail', 'nullable', 'integer', 'exists:categories,id',
                /* --!> a category couldn't be its parent <!-- */
                Rule::notIn([request()->route('category')->id])
            ]
        ];
    }
}
