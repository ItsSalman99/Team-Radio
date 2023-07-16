<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if(Country::count() == 0)
        {
            Country::create([
                'name' => 'Pakistan'
            ]);

            Country::create([
                'name' => 'United States'
            ]);

            Country::create([
                'name' => 'Canada'
            ]);

            Country::create([
                'name' => 'Austrailia'
            ]);

        }

    }
}
