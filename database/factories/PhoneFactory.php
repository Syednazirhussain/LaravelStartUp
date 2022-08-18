<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Phone;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
    */
    protected $model = Phone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::pluck('id')->toArray();

        return [
            'phone'   => $this->faker->numerify('###########'),  
            'user_id' => $this->faker->randomElement($users)
        ];
    }
}
