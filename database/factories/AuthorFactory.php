<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{


    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arrayValues = ['researcher', 'teacher', 'poet'];

        return [
            'name' => $this->faker->name(),
            'dob' => $this->faker->date('Y-m-d', 'UTC'),
            'profession' => $arrayValues[rand(0,2)],
            'active' => $this->faker->boolean(),
        ];
    }
}
