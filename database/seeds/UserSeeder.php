<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin@gmail.com'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Driver 1',
            'email' => 'driver1@gmail.com',
            'password' => bcrypt('driver1@gmail.com'),
        ]);

        $user->assignRole('user');


        $user = User::create([
            'name' => 'Driver 2',
            'email' => 'driver2@gmail.com',
            'password' => bcrypt('driver2@gmail.com'),
        ]);

        $user->assignRole('user');


        $user = User::create([
            'name' => 'Driver 3',
            'email' => 'driver3@gmail.com',
            'password' => bcrypt('driver3@gmail.com'),
        ]);

        $user->assignRole('user');
    }
}
