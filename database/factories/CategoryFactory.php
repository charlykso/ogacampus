<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['event', 'item', 'service']);

        return [
            'name' => $this->faker->unique()->words(2, true),
            'slug' => $this->faker->unique()->words(2, true),
            'type' => $type,
        ];
    }
}
