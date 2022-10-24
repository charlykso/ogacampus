<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $event = Event::all()->random();
        $ticket = $this->faker->randomElement(['normal', 'vip']);
        $user = User::where('role_id', 5)->get()->random();
        $unit_price = $event->ticket_price[0]['price'];
        $qty = rand(1, 3);

        return [
            'event_id' => $event->id,
            'user_id' => $user->id,
            'unit_price' => $unit_price,
            'ticket' => $ticket,
            'quantity' => $qty,
            'reference' => $this->faker->regexify('[A-Za-z0-9]{8}'),
            'amount' => $unit_price * $qty,
            'status' => $this->faker->randomElement(['pending', 'completed']),
            'uuid' => $this->faker->uuid(),
        ];
    }
}
