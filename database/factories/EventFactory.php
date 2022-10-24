<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\School;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price = [
            'type' => $this->faker->randomElement(['normal', 'vip']),
            'price' => $this->faker->numberBetween(10, 1000),
        ];
        $title = $this->faker->text($maxNbChars = 30);
        $slug = Str::slug($title);

        return [
            'user_id' => User::all()->random()->id,
            'school_id' => School::all()->random()->id,
            'title' => $title,
            'slug' => $slug,
            'event_date' => $this->faker->date,
            'description' => $this->faker->paragraph,
            'address' => $this->faker->address,
            'category_id' => rand(1, 12),
            'pictures' => json_encode(['url' => 'nothumbnail.jpeg']),
            'organizer' => $this->faker->company,
            'contact' => $this->faker->phoneNumber,
            // 'pictures' => json_encode(array("url"=> $this->faker->imageUrl($width = 200, $height = 200))),
            'isFree' => 0,
            'ticket_price' => [$price],
            'uuid' => $this->faker->uuid(),
        ];
    }
}
