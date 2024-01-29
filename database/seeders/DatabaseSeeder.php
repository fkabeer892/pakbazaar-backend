<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location = \App\Models\Location::create([
            "name" => "Islamabad"
        ]);

        \App\Models\Role::insert([
            ["name" => "Super Admin", "guard_name" => "admin"],
            ["name" => "Admin", "guard_name" => "admin"],
            ["name" => "Employee", "guard_name" => "admin"],
            ["name" => "Seller", "guard_name" => "admin"],
            ["name" => "Customer", "guard_name" => "web"],
        ]);

        $adminSeeder = new AdminSeeder();

        $adminSeeder->run();





    }
}
