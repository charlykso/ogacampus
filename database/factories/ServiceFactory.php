<?php

namespace Database\Factories;

use App\Models\School;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text($maxNbChars = 30);
        $slug = Str::slug($title);

        return [
            'user_id' => User::all()->random()->id,
            'school_id' => School::all()->random()->id,
            'slug' => $slug,
            'category_id' => rand(1, 12),
            'logo' => $this->faker->randomElement(['https://bit.ly/3BtKAgA', 'https://bit.ly/3BnUbnZ']),
            'description' => $this->faker->paragraph,
            'service_name' => $this->faker->company,
            'pictures' => ['https://bit.ly/3BtKAgA', 'https://bit.ly/3BnUbnZ'],
        ];
    }
}
