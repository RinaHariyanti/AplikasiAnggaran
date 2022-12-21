<?php

namespace Modules\MenuManagement\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\MenuManagement\app\Models\MenuGroup;
use Modules\MenuManagement\app\Models\MenuItem;

class MenuGeneralSeederTableSeeder extends Seeder
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

        $general = MenuGroup::create([
            'name' => 'General',
            'permission_name' => 'general',
            'posision' => 1,
        ]);

        MenuItem::create([
            'name' => 'Dashboard',
            'icon' => 'ri-dashboard-2-line',
            'route' => 'dashboard.index',
            'permission_name' => 'dashboard_index',
            'menu_group_id' => $general->id,
            'posision' => 1,
        ]);

        MenuItem::create([
            'name' => 'Pemasukan',
            'icon' => 'ri-money-dollar-circle-line',
            'route' => 'invoice.index',
            'permission_name' => 'dashboard_index',
            'menu_group_id' => $general->id,
            'posision' => 2,
        ]);
        MenuItem::create([
            'name' => 'Pengeluaran',
            'icon' => 'ri-currency-line',
            'route' => 'pengeluaran.index',
            'permission_name' => 'dashboard_index',
            'menu_group_id' => $general->id,
            'posision' => 3,
        ]);
        MenuItem::create([
            'name' => 'Saldo',
            'icon' => 'ri-bank-line',
            'route' => 'saldo.index',
            'permission_name' => 'dashboard_index',
            'menu_group_id' => $general->id,
            'posision' => 4,
        ]);
        MenuItem::create([
            'name' => 'RT',
            'icon' => 'ri-home-4-line',
            'route' => 'rt.index',
            'permission_name' => 'dashboard_index',
            'menu_group_id' => $general->id,
            'posision' => 5,
        ]);
    }
}
