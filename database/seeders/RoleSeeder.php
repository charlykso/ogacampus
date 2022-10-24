<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['title'=>'User', 'id'=> 5],
            ['title'=>'Staff', 'id'=> 25],
            ['title'=>'Admin', 'id'=> 125]
        ];

        foreach($roles as $rol){
            Role::create($rol);
        }
    }
}
