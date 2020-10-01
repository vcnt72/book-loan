<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'member'
        ]);
        Role::create(['name' => 'publisher']);
        Role::create(['name' => 'admin']);
    }
}
