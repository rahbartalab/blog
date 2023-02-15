<?php

namespace Database\Factories;

use App\Enums\PostStatusEnum;
use App\Enums\PostTypeEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'user_id' => random_int(1, count(User::all())),
            'type' => PostTypeEnum::cases()[random_int(0, count(PostTypeEnum::cases()) - 1)],
            'slug' => fake()->slug,
            'title' => fake()->title,
            'excerpt' => fake()->text(10),
            'body' => fake()->text(20),
            'status' => PostStatusEnum::cases()[random_int(0, count(PostStatusEnum::cases()) - 1)],
        ];
    }
}
