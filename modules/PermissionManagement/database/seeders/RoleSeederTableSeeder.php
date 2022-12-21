<?php

namespace Modules\PermissionManagement\database\seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeederTableSeeder extends Seeder
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

        $superadmin = Role::create(['name' => 'Super Admin']);
        $user = Role::create(['name' => 'User']);
        $bendahara = Role::create(['name' => 'Bendahara']);

        $superadmin->givePermissionTo(Permission::all());
        $user->givePermissionTo([
            'general',
            'dashboard_index',
            'profile_index',
            'invoice_index',
            'pengeluaran_index',
        ]);
        $bendahara->givePermissionTo([
            'general',
            'dashboard_index',
            'profile_index',
            'invoice_index',
            'invoice_store',
            'invoice_update',
            'invoice_destroy',
            'pengeluaran_index',
            'pengeluaran_store',
            'pengeluaran_update',
            'pengeluaran_destroy',
        ]);

        User::firstWhere('email', 'superadmin@gmail.com')->assignRole('Super Admin');
        User::firstWhere('email', 'user@gmail.com')->assignRole('User');
        User::firstWhere('email', 'bendahara@gmail.com')->assignRole('Bendahara');
    }
}
