<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
    //
    $states = [
        ['name' => 'FCT', 'country_id' => 160],
        ['name' => 'Abia', 'country_id' => 160],
        ['name' => 'Adamawa', 'country_id' => 160],
        ['name' => 'Akwa Ibom', 'country_id' => 160],
        ['name' => 'Anambra', 'country_id' => 160],
        ['name' => 'Bauchi', 'country_id' => 160],
        ['name' => 'Bayelsa', 'country_id' => 160],
        ['name' => 'Benue', 'country_id' => 160],
        ['name' => 'Borno', 'country_id' => 160],
        ['name' => 'Cross River', 'country_id' => 160],
        ['name' => 'Delta', 'country_id' => 160],
        ['name' => 'Ebonyi', 'country_id' => 160],
        ['name' => 'Edo', 'country_id' => 160],
        ['name' => 'Ekiti', 'country_id' => 160],
        ['name' => 'Enugu', 'country_id' => 160],
        ['name' => 'Gombe', 'country_id' => 160],
        ['name' => 'Imo', 'country_id' => 160],
        ['name' => 'Jigawa', 'country_id' => 160],
        ['name' => 'Kaduna', 'country_id' => 160],
        ['name' => 'Kano', 'country_id' => 160],
        ['name' => 'Katsina', 'country_id' => 160],
        ['name' => 'Kebbi', 'country_id' => 160],
        ['name' => 'Kogi', 'country_id' => 160],
        ['name' => 'Kwara', 'country_id' => 160],
        ['name' => 'Lagos', 'country_id' => 160],
        ['name' => 'Nassarawa', 'country_id' => 160],
        ['name' => 'Niger', 'country_id' => 160],
        ['name' => 'Ogun', 'country_id' => 160],
        ['name' => 'Ondo', 'country_id' => 160],
        ['name' => 'Osun', 'country_id' => 160],
        ['name' => 'Osun', 'country_id' => 160],
        ['name' => 'Oyo', 'country_id' => 160],
        ['name' => 'Plateau', 'country_id' => 160],
        ['name' => 'Rivers', 'country_id' => 160],
        ['name' => 'Sokoto', 'country_id' => 160],
        ['name' => 'Taraba', 'country_id' => 160],
        ['name' => 'Yobe', 'country_id' => 160],
        ['name' => 'Zamfara', 'country_id' => 160]
    ];
    State::insert($states);
    }
}
