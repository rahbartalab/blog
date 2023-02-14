<?php

namespace App\Http\Requests\Blog\Post;

use App\Enums\PostStatusEnum;
use App\Enums\PostTypeEnum;
use App\Rules\TagRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use function collect;
use function now;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge(['tags' => array_unique($this->get('tags'))]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:posts', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/'],
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
