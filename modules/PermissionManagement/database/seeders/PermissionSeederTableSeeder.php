<?php

namespace Modules\PermissionManagement\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class PermissionSeederTableSeeder extends Seeder
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

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'general']);
        Permission::create(['name' => 'setting']);

        // dashboard
        Permission::create(['name' => 'dashboard_index']);

        // General Setting
        Permission::create(['name' => 'setting_index']);
        Permission::create(['name' => 'setting_update']);

        // User Management
        Permission::create(['name' => 'user_index']);
        Permission::create(['name' => 'user_store']);
        Permission::create(['name' => 'user_update']);
        Permission::create(['name' => 'user_destroy']);

        // User Profile
        Permission::create(['name' => 'profile_index']);

        // Menu Management Group
        Permission::create(['name' => 'menu_index']);
        Permission::create(['name' => 'menu_store']);
        Permission::create(['name' => 'menu_update']);
        Permission::create(['name' => 'menu_destroy']);

        // Menu Management Items
        Permission::create(['name' => 'menu_item_index']);
        Permission::create(['name' => 'menu_item_store']);
        Permission::create(['name' => 'menu_item_update']);
        Permission::create(['name' => 'menu_item_destroy']);

        // Route Management
        Permission::create(['name' => 'route_index']);
        Permission::create(['name' => 'route_store']);
        Permission::create(['name' => 'route_update']);
        Permission::create(['name' => 'route_destroy']);

        // Role Management
        Permission::create(['name' => 'role_index']);
        Permission::create(['name' => 'role_store']);
        Permission::create(['name' => 'role_update']);
        Permission::create(['name' => 'role_destroy']);

        // Permission Management
        Permission::create(['name' => 'permission_index']);
        Permission::create(['name' => 'permission_store']);
        Permission::create(['name' => 'permission_update']);
        Permission::create(['name' => 'permission_destroy']);

        // Invoice Management
        Permission::create(['name' => 'invoice_index']);
        Permission::create(['name' => 'invoice_store']);
        Permission::create(['name' => 'invoice_update']);
        Permission::create(['name' => 'invoice_destroy']);

        // Pengeluaran Management
        Permission::create(['name' => 'pengeluaran_index']);
        Permission::create(['name' => 'pengeluaran_store']);
        Permission::create(['name' => 'pengeluaran_update']);
        Permission::create(['name' => 'pengeluaran_destroy']);
    }
}
