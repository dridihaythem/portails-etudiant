<?php

namespace Database\Seeders;

use App\Models\Student;
use Database\Factories\StudentFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(DepartmentTableSeeder::class);

        // Student::factory(50)->create();
        $this->call([
            DepartmentTableSeeder::class,
            SpecialiteTableSeeder::class,
            ClasseTableSeeder::class,
            StudentTableSeeder::class,
            AdminTableSeeder::class,
            SettingTableSeeder::class,
            NewsTableSeeder::class
        ]);
    }
}
