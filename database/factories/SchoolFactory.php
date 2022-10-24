<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\School;
use Illuminate\Support\Str;

class SchoolFactory extends Factory
{
   /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = School::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    { 

        return [
            'name' => $this->faker->name . ' University',
            'code' => "UNILAG", 
            'state_id' => $this->faker->unique()->randomDigit,  
        ];
    }
}
