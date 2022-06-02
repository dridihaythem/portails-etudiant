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
            'specialite_id' => 1,
            'number' => 1,
            'level' => 1,
        ]);

        Classe::create([
            'specialite_id' => 1,
            'number' => 2,
            'level' => 1,
        ]);

        Classe::create([
            'specialite_id' => 1,
            'number' => 3,
            'level' => 1,
        ]);

        Classe::create([
            'specialite_id' => 2,
            'number' => 1,
            'level' => 2,
        ]);

        Classe::create([
            'specialite_id' => 2,
            'number' => 2,
            'level' => 2,
        ]);

        Classe::create([
            'specialite_id' => 3,
            'number' => 1,
            'level' => 2,
        ]);

        Classe::create([
            'specialite_id' => 4,
            'number' => 1,
            'level' => 2,
        ]);

        Classe::create([
            'specialite_id' => 2,
            'number' => 1,
            'level' => 3,
        ]);

        Classe::create([
            'specialite_id' => 2,
            'number' => 2,
            'level' => 3
        ]);

        Classe::create([
            'specialite_id' => 3,
            'number' => 1,
            'level' => 3
        ]);

        Classe::create([
            'specialite_id' => 4,
            'number' => 1,
            'level' => 3
        ]);
    }
}
