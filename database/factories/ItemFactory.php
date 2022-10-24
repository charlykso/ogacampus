<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Item;
use App\Models\School;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $images = [
            'https://bit.ly/3RheHwL',
            'https://bit.ly/3PYnmTO',
            'https://bit.ly/3CHoh88',
            'https://bit.ly/3TClJ18',
            'https://bit.ly/3Q0FCvB',
            'https://bit.ly/3TrTgLq',
            'https://bit.ly/3KwOAzR',
            'https://bit.ly/3Kvf9oN',
        ];

        $title = $this->faker->text($maxNbChars = 30);
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'user_id' => User::all()->random()->id,
            'description' => $this->faker->paragraph,
            'category_id' => Category::all()->random()->id,
            'slug' => $slug,
            'school_id' => School::all()->random()->id,
            'price' => $this->faker->numberBetween($min = 1500, $max = 6000),
            // 'pictures' => json_encode(array("url"=> $this->faker->imageUrl($width = 200, $height = 200))),
            'pictures' => [$this->faker->randomElement($images)],
            'status' => $this->faker->randomElement(['active', 'expired', 'draft', 'review']),
        ];
    }
}
