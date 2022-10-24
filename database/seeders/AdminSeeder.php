<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'email' => "admin@ogacampus.com",
                'email_verified_at' => now(),
                'role_id' => Role::where('title', 'Admin')->first()->id,
                'school_id' => 3,
                'phone' =>  '080123456789',
                'password' => bcrypt("password"),
                'remember_token' => Str::random(10),
            ]);
    }
}
