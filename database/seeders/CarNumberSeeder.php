<?php

namespace Database\Seeders;

use App\Models\CarNumber;
use Illuminate\Database\Seeder;

class CarNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (CarNumber::count() == 0) {
            CarNumber::create([
                'name' => '1221'
            ]);

            CarNumber::create([
                'name' => '1321'
            ]);

            CarNumber::create([
                'name' => '1123'
            ]);

            CarNumber::create([
                'name' => '1225'
            ]);
        }
    }
}
