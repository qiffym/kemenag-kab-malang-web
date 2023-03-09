<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => random_int(1, 10),
            'post_category_id' => random_int(1, 12),
            'title' => $this->faker->sentence(random_int(5, 10)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->text(),
            'body' => $this->faker->paragraph(50),
            'click' => random_int(10, 200),
            'publish_at' => now(),
        ];
    }
}
