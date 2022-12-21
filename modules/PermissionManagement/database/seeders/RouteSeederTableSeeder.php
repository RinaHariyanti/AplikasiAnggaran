<?php

namespace Modules\PermissionManagement\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\PermissionManagement\app\Models\Route;

class RouteSeederTableSeeder extends Seeder
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

        // Dashboard
        Route::insert([
            [
                'route' => 'dashboard.index',
                'permission_name' => 'dashboard_index'
            ],
        ]);

        // General Setting
        Route::insert([
            [
                'route' => 'setting.index',
                'permission_name' => 'setting_index'
            ],
            [
                'route' => 'setting.update',
                'permission_name' => 'setting_update'
            ],
        ]);

        // User Management
        Route::insert([
            [
                'route' => 'user.index',
                'permission_name' => 'user_index'
            ],
            [
                'route' => 'user.store',
                'permission_name' => 'user_store'
            ],
            [
                'route' => 'user.update',
                'permission_name' => 'user_update'
            ],
            [
                'route' => 'user.destroy',
                'permission_name' => 'user_destroy'
            ],
        ]);

        // User Profile
        Route::insert([
            [
                'route' => 'profile.index',
                'permission_name' => 'profile_index'
            ]
        ]);

        // Menu Group Management
        Route::insert([
            [
                'route' => 'menu.index',
                'permission_name' => 'menu_index'
            ],
            [
                'route' => 'menu.store',
                'permission_name' => 'menu_store'
            ],
            [
                'route' => 'menu.update',
                'permission_name' => 'menu_update'
            ],
            [
                'route' => 'menu.destroy',
                'permission_name' => 'menu_destroy'
            ],
        ]);

        // Menu Item Management
        Route::insert([
            [
                'route' => 'menu.item.index',
                'permission_name' => 'menu_item_index'
            ],
            [
                'route' => 'menu.item.store',
                'permission_name' => 'menu_item_store'
            ],
            [
                'route' => 'menu.item.update',
                'permission_name' => 'menu_item_update'
            ],
            [
                'route' => 'menu.item.destroy',
                'permission_name' => 'menu_item_destroy'
            ],
        ]);

        // Route Management
        Route::insert([
            [
                'route' => 'route.index',
                'permission_name' => 'route_index'
            ],
            [
                'route' => 'route.store',
                'permission_name' => 'route_store'
            ],
            [
                'route' => 'route.update',
                'permission_name' => 'route_update'
            ],
            [
                'route' => 'route.destroy',
                'permission_name' => 'route_destroy'
            ],
        ]);

        // Role Management
        Route::insert([
            [
                'route' => 'role.index',
                'permission_name' => 'role_index'
            ],
            [
                'route' => 'role.store',
                'permission_name' => 'role_store'
            ],
            [
                'route' => 'role.update',
                'permission_name' => 'role_update'
            ],
            [
                'route' => 'role.destroy',
                'permission_name' => 'role_destroy'
            ],
        ]);

        // Permission Management
        Route::insert([
            [
                'route' => 'permission.index',
                'permission_name' => 'permission_index'
            ],
            [
                'route' => 'permission.store',
                'permission_name' => 'permission_store'
            ],
            [
                'route' => 'permission.update',
                'permission_name' => 'permission_update'
            ],
            [
                'route' => 'permission.destroy',
                'permission_name' => 'permission_destroy'
            ],
        ]);

        Route::insert([
            [
                'route' => 'invoice.index',
                'permission_name' => 'invoice_index'
            ],
            [
                'route' => 'invoice.store',
                'permission_name' => 'invoice_store'
            ],
            [
                'route' => 'invoice.update',
                'permission_name' => 'invoice_update'
            ],
            [
                'route' => 'invoice.destroy',
                'permission_name' => 'invoice_destroy'
            ],
        ]);

        Route::insert([
            [
                'route' => 'pengeluaran.index',
                'permission_name' => 'pengeluaran_index'
            ],
            [
                'route' => 'pengeluaran.store',
                'permission_name' => 'pengeluaran_store'
            ],
            [
                'route' => 'pengeluaran.update',
                'permission_name' => 'pengeluaran_update'
            ],
            [
                'route' => 'pengeluaran.destroy',
                'permission_name' => 'pengeluaran_destroy'
            ],
        ]);
    }
}
