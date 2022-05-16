<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name' => 'date_debut_depot_rapports',
            'value' =>  '05-05-2022'
        ]);

        Setting::create([
            'name' => 'date_fin_depot_rapports',
            'value' =>  '10-05-2022'
        ]);
    }
}
