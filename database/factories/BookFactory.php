<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
    */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = ['novel', 'science', 'medical'];
        $authors = Author::pluck('id')->toArray();

        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(45),
            'author_id' => $this->faker->randomElement($authors),
            'book_type' => $types[rand(0,2)],
            'price' => rand(50, 250)
        ];
    }
}
