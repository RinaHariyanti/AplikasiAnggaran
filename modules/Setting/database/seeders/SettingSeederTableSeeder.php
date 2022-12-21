<?php

namespace Modules\Setting\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Setting\app\Models\Setting;

class SettingSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");

        $logo = array(
            'sm' => 'logo-sm.png',
            'dark' => 'logo-dark.png',
            'light' => 'logo-light.png',
        );

        $data = array(
            'role' => 'User',
            'logo' => json_encode($logo)
        );

        Setting::create([
            'name' => 'General',
            'data' => json_encode($data)
        ]);
    }
}
