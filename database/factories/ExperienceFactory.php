<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company' => $this->faker->company,
            'title' => $this->faker->jobTitle,
            'user_id' => User::all()->random(),
            'start_date' => $this->faker->dateTime,
            'end_date' => $this->faker->dateTime,
            'content' => $this->faker->paragraphs(3,true),
            'photo' => $this->faker->imageUrl
        ];
    }
}
