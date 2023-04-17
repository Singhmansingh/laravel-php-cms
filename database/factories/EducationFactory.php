<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'school_name' => $this->faker->word,
            'user_id' => User::all()->random(),
            'level_of_education' => $this->faker->word,
            'field' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(3,true),
            'location' => $this->faker->word,
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date
        ];
    }

}
