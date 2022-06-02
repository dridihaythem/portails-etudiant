<?php

namespace Database\Seeders;

use App\Models\Specialite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specialite::create([
            'department_id' => 1,
            'name' => 'Tronc commun',
            'prefix' => 'TI'
        ]);

        Specialite::create([
            'department_id' => 1,
            'name' => 'Développement des systèmes d’information',
            'prefix' => 'DSI'
        ]);

        Specialite::create([
            'department_id' => 1,
            'name' => 'Réseaux et services informatiques',
            'prefix' => 'RES'
        ]);

        Specialite::create([
            'department_id' => 1,
            'name' => 'Systèmes embarqués et mobiles',
            'prefix' => 'SEM'
        ]);
    }
}
