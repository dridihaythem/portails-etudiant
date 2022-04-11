<?php

namespace Database\Seeders;

use App\Models\Classe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classe::create([
            'name' => "Technologies de l'informatique"
        ]);

        Classe::create([
            'name' => "Génie électrique"
        ]);

        Classe::create([
            'name' => "Génie de procédés"
        ]);

        Classe::create([
            'name' => "Sciences économiques et de gestion"
        ]);
    }
}
