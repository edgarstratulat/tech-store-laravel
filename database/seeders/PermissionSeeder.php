<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        Permission::create(['name' => 'Manage Store']);
        Permission::create(['name' => 'Buy item in Store']);

        $admin->givePermissionTo('Manage Store');
        $user->givePermissionTo('Buy item in Store');

        $adminUser = User::find(1);
        $adminUser->assignRole('admin');

    }
}
