<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
    */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = [User::class, Post::class];

        $user_ids = User::all()->pluck('id');
        $shuffled = $user_ids->shuffle();

        return [
            'url'   => url('/'),
            'imageable_type' => $types[rand(0, 1)],
            'imageable_id' => $this->faker->randomElement($shuffled->all()),
        ];
    }
}
