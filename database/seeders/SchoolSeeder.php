<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\School;
use Illuminate\Support\Str;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = [
            [
                'name' => 'University of Lagos',
                'code' => 'UNILAG',
                'state_id' => 25,
                'uuid' => Str::uuid(),
                'created_at' => now()
            ],
            [
                'name' => 'University of Benin',
                'code' => 'UNIBEN',
                'state_id' => 13,
                'uuid' => Str::uuid(),
                'created_at' => now()
            ],
            [
                'name' => 'Ambrose Alli University, Ekpoma',
                'code' => 'AAU',
                'state_id' => 13,
                'uuid' => Str::uuid(),
                'created_at' => now()
            ],
            [
                'name' => 'Usman Dan Fodio University',
                'code' => 'UDU',
                'state_id' => 35,
                'uuid' => Str::uuid(),
                'created_at' => now()
            ],
            [
                'name' => 'Lagos State Polytechnic',
                'code' => 'LASPOTECH',
                'state_id' => 25,
                'uuid' => Str::uuid(),
                'created_at' => now()
            ],
            [
                'name' => 'Federal Polytechnic, Ede',
                'code' => 'FEDPOEDE',
                'state_id' => 30,
                'uuid' => Str::uuid(),
                'created_at' => now()
            ],
            [
                'name' => 'Abia State University, Uhuru',
                'code' => 'ABSU',
                'state_id' => 2,
                'uuid' => Str::uuid(),
                'created_at' => now()
            ]
        ];
        School::insert($schools);
    }
}
