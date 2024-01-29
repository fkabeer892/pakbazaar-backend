<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'first_name' => $this->faker->first_name,
            'last_name' => $this->faker->last_name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => app('hash')->make('123456'),
            'phone_number' => $this->faker->phoneNumber(),
            'lat' => $this->faker->randomFloat("6", 0, 179),
            'lon' => $this->faker->randomFloat("6", 0, 179),
            'is_verified' => 1,
            "is_active" => 1
        ];
    }
}
