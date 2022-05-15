<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'cin' => 11000000,
            'first_name' => 'Haythem',
            'last_name' => 'Dridi',
            'password' =>  Hash::make(123456789)
        ]);
    }
}
