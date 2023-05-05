<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Superviseur',
                'email' => 'admin@email.com',
                'password' => bcrypt('admin2020'),
                'remember_token' => Str::random(10),
                'city' => 'Unknown',
                'role' => 'admin',
                'cv'=>'Unknown',
                'image' => 'Unknown',
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }


        $roles = [
            [
                'name' => 'admin',
            ],

            [
                'name' => 'cadre',
            ],

            [
                'name' => 'consultant',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
