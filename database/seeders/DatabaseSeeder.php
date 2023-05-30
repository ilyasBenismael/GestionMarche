<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Prixe;
use App\Models\role;
use App\Models\TypeMarche;
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

        $prixes = [
            [
                'numero' => 1,
                'designation' => 'designation1',
                'marche' => 1,
                'unite' => 1,
                'quantite' => 1,
                'prix_unitaire' => 1,
                'categorie_prix' => 1,
            ],
            [
                'numero' => 2,
                'designation' => 'designation2',
                'marche' => 1,
                'unite' => 2,
                'quantite' => 2,
                'prix_unitaire' => 2,
                'categorie_prix' => 2,
            ],
            [
                'numero' => 3,
                'designation' => 'designation3',
                'marche' => 1,
                'unite' => 3,
                'quantite' => 3,
                'prix_unitaire' => 3,
                'categorie_prix' => 3,
            ],
        ];

        foreach ($prixes as $prix) {
            Prixe::create($prix);
        }



        $users = [
            [
                'name' => 'Superviseur',
                'email' => 'admin@email.com',
                'password' => bcrypt('admin2020'),
                'remember_token' => Str::random(10),
                'city' => 'Unknown',
                'role' => 'admin',
                'cv'=>'Unknown',
                'image' => 'profile.jpg',
            ],
            [
            'name' => 'amin raghib',
            'email' => 'amin@email.com',
            'password' => bcrypt('amin123456'),
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





        $typeMarches = [
            [
                'type' => 'fourniture',
            ],

            [
                'type' => 'travaux',
            ],

            [
                'type' => 'service',
            ],
        ];

        foreach ($typeMarches as $typeMarche) {
            typemarche::create($typeMarche);
        }




    }
}
