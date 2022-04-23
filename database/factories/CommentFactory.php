<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
           /**
     * The name of the factory
     *
     * @var string
     */
    /**
     */
      protected $model = Comment::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => $this->faker->randomDigit(),
            'content' => $this->faker->paragraph,
            'created_at' => now()
        ];
    }
}
