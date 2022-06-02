<?php

namespace Database\Seeders;
use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => "Technologies de l'informatique"
        ]);

        Department::create([
            'name' => "Génie électrique"
        ]);

        Department::create([
            'name' => "Génie de procédés"
        ]);

        Department::create([
            'name' => "Sciences économiques et de gestion"
        ]);
    }
}
