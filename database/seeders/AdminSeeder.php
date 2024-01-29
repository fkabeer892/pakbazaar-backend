<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([

            'name'  => 'Super Admin',
            'email'  => 'super.admin@pakbazaar.com',
            'password'  =>app('hash')->make('admin@123'),
        ]);

          $user->assignRole('Super Admin');
    }
}
