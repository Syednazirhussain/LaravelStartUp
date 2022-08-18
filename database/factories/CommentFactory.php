<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
    */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $posts = Post::pluck('id')->toArray();

        return [
            'text'   => $this->faker->text(),  
            'post_id' => $this->faker->randomElement($posts)
        ];
    }
}
