<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     * @var string
     * */
     protected $model = Post::class;

    /**
     * Define the model's default state.
     * @return array
     * */
     
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,7)),
            'slug' => $this->faker->slug(),
            'category_id' => 1,
            // 'images' => 'array',
            'namad' => $this->faker->sentence(mt_rand(2,7)),
            'namab' => $this->faker->sentence(mt_rand(2,7)),
            'nik' => $this->faker->sentence(mt_rand(2,7)),
            'ttl' => $this->faker->sentence(mt_rand(2,7)),
            'email' => $this->faker->sentence(mt_rand(2,7)),
            'notelp' => $this->faker->sentence(mt_rand(2,7)),
            'alamat' => $this->faker->sentence(mt_rand(2,7)),
            'excerpt' => $this->faker->paragraph(),
            'body' => collect($this->faker->paragraphs(mt_rand(5,10)))->map(function($p){
                return "<p>$p</p><br>";
            })->implode(''),
            'user_id' => mt_rand(1,3),
        ];
    }
}
