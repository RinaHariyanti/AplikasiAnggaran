<?php

namespace Database\Seeders;

use Database\Seeders\User\UserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\MenuManagement\database\seeders\MenuManagementDatabaseSeeder;
use Modules\PermissionManagement\database\seeders\PermissionManagementDatabaseSeeder;
use Modules\Rt\database\seeders\RtDatabaseSeeder;
use Modules\Setting\database\seeders\SettingDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        print('-------- Core Seeder --------' . PHP_EOL);
        $this->call(UserSeeder::class);

        print('-------- Module Seeder --------' . PHP_EOL);
        $this->call(MenuManagementDatabaseSeeder::class);
        $this->call(PermissionManagementDatabaseSeeder::class);
        $this->call(SettingDatabaseSeeder::class);
        $this->call(RtDatabaseSeeder::class);
    }
}
