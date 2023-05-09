<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => 1,
            'name' => 'admin',
            'email' => 'admin@images-app.com',
            'password' => Hash::make('admin'),
        ]);
        User::create([
            'role_id' => 2,
            'name' => 'user1',
            'email' => 'user1@images-app.com',
            'password' => Hash::make('admin'),
        ]);
        User::create([
            'role_id' => 3,
            'name' => 'user2',
            'email' => 'user2@images-app.com',
            'password' => Hash::make('admin'),
        ]);
        User::create([
            'role_id' => 3,
            'name' => 'user3',
            'email' => 'user3@images-app.com',
            'password' => Hash::make('admin'),
        ]);
        User::create([
            'role_id' => 3,
            'name' => 'user4',
            'email' => 'user4@images-app.com',
            'password' => Hash::make('admin'),
        ]);
        User::create([
            'role_id' => 3,
            'name' => 'user5',
            'email' => 'user5@images-app.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
