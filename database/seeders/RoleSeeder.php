<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin' => 'have all the privliges',
            'moderator' => 'can view and edit post, comments',
            'subscriber' => 'only have view post power',
        ];

        foreach ($roles as $role=>$description) {
            Role::create([
                'name' => $role,
                'description' => $description,
            ]);
        }
    }
}
