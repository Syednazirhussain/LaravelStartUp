<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleUserFactory extends Factory
{
    
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
    */
    protected $model = RoleUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $roles = Role::pluck('id')->toArray();
        $users = User::pluck('id')->toArray();

        return [ 
            'user_id' => $this->faker->randomElement($users),
            'role_id' => $this->faker->randomElement($roles)
        ];
    }
}
