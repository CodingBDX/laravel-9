<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;
use \Faker\Provider\Youtube;
use Faker\Provider\youtubeUri;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{


           /**
     * The name of the factory
     *
     * @var string
     */
    /**
     */
      protected $model = Video::class;



    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'url' => $this->faker->youtubeUri()
        ];
    }
}
