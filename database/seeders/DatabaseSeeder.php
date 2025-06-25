<?php

namespace Database\Seeders;

use App\Models\Bureau;
use App\Models\Categorie;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       $bureau = Bureau::create([
            'nom_bureau' => 'SERVICE INFORMATIQUE',
        ]);

        Categorie::create([
            'nom_categorie' => 'POUR DIFFUSION',
        ]);

        User::create([
            'name' => 'Yapi',
            'last_name' => 'théodore',
            'email' => 'theodoreyapi@gmail.com',
            'phone' => '0585831647',
            'password' => Hash::make(1234567890),
            'type' => 'admin',
            'bureau_id' => $bureau->id_bureau,
        ]);
    }
}
