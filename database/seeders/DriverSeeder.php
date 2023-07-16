<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (Driver::count() == 0) {
            Driver::create([
                'name' => 'John'
            ]);

            Driver::create([
                'name' => 'Ben Smith'
            ]);

            Driver::create([
                'name' => 'Kurut'
            ]);

            Driver::create([
                'name' => 'Mark'
            ]);
        }
    }
}
