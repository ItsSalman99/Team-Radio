<?php

namespace Database\Seeders;

use App\Models\Race;
use Illuminate\Database\Seeder;

class RacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Race::count() == 0) {
            Race::create([
                'name' => 'Race 1'
            ]);

            Race::create([
                'name' => 'Race 2'
            ]);

            Race::create([
                'name' => 'Race 3'
            ]);

            Race::create([
                'name' => 'Race 4'
            ]);
        }
    }
}
