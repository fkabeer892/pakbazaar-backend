<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // add Roles
        Role::create([
            'name'  => 'Super Admin'
            ]);
        Role::create([
            'name'  => 'Admin'
        ]);
        Role::create([
            'name'  => 'User'
        ]);
        Role::create([
            'name'  => 'Worker'
        ]);
        Role::create([
            'name'  => 'Seller'
        ]);
        Role::create([
            'name'  => 'Employee'
        ]);

        // Add Permission
        Permission::create([
            'name'  => 'Add Users'
        ]);
        Permission::create([
            'name'  => 'Edit users'
        ]);
        Permission::create([
            'name'  => 'Update User'
        ]);
        Permission::create([
            'name'  => 'Delete User'
        ]);
    }
}
