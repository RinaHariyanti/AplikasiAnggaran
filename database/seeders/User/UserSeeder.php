<?php

namespace Database\Seeders\User;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'Bendahara',
            'email' => 'bendahara@gmail.com',
        ]);
    }
}
