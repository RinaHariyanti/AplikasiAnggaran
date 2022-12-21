<?php

namespace Modules\Rt\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Rt\app\Models\NamaRt;
use Modules\Saldo\app\Models\Rt;

class RtTableSeeder extends Seeder
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

        NamaRt::create(['name' => 'RT 01']);
        NamaRt::create(['name' => 'RT 02']);
        NamaRt::create(['name' => 'RT 03']);
        NamaRt::create(['name' => 'RT 04']);
        NamaRt::create(['name' => 'RT 05']);
    }
}
