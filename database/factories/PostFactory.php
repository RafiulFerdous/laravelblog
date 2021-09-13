<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'title'=>$this->faker->sentence(),
            'slug'=>Str::slug($this->faker->sentence()),
            'image'=>$this->faker->imageUrl(600, 400),
            'description'=>$this->faker->text(500),
            'category_id'=>self::factoryForModel('Category')->create()->id,
            'user_id'=> 1,

        ];
    }
}
