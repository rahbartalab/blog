<?php

namespace App\Http\Requests\Blog\Post;

use App\Enums\PostStatusEnum;
use App\Enums\PostTypeEnum;
use App\Rules\TagRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required', 'string', 'max:255',
                Rule::unique('posts', 'slug')->ignore($this->route('post')),
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/'
            ],
            'excerpt' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:255'],
            'type' => [
                'required', 'string',
                Rule::in(collect(PostTypeEnum::cases())->pluck('value')->toArray())
            ],
            'published_at' => ['required', 'date', 'after:' . now()->format('Y/m/d')],
            'status' => [
                'required', 'string',
                Rule::in(collect(PostStatusEnum::cases())->pluck('value')->toArray())
            ],
            'categories' => ['bail', 'nullable', 'array'],
            'categories.*' => ['bail', 'int', 'exists:categories,id'],
            'tags' => ['bail', 'nullable', 'array'],
            'tags.*' => ['max:255', new TagRule()],
            'image' => ['nullable', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']

        ];
    }
}
