<?php

namespace Database\Factories;

use App\Models\School;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    protected $model = Shop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $business = $this->faker->company;

        return [
            'user_id' => User::where('role_id', 5)->get()->random()->id,
            'school_id' => School::all()->random()->id,
            'slug' => str_replace(' ', '-', $business),
            'business_name' => $business,
            'tagline' => $this->faker->realText($maxNbChars = 10),
            'description' => $this->faker->realText($maxNbChars = 20),
            'cover_image' => $this->faker->imageUrl(1200, 800, 'business', true),
            // 'pictures',
            'status' => $this->faker->randomElement(['active', 'suspended']),
            'uuid' => $this->faker->uuid(),
        ];
    }
}
