<?php

use App\Models\Car;
use App\Models\Owner;
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OwnerFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
    */
    protected $model = Owner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cars = Car::pluck('id')->toArray();

        return [
            'name' => $this->faker->name(),
            'car_id'   => $this->faker->randomElement($cars);
        ];
    }
}
