<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'github_id' => $this->faker->numerify('########'),
            'name' => $this->faker->name(),
            'nickname' => $this->faker->name(),
            'avatar_src' => $this->faker->imageUrl(100, 100),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => null,
            'password' => Str::random(64),
            'remember_token' => Str::random(10),
        ];
    }
}
