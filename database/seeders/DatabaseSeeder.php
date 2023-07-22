<?php

namespace Database\Seeders;

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
        $this->call(UserSeeder::class);
        // \App\Models\User::factory(10)->create();
        $this->call(CountrySeeder::class);
        $this->call(DriverSeeder::class);
        $this->call(RacesSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(CarNumberSeeder::class);
        $this->call(ReportReasonSeeder::class);
        $this->call(UsernameSeeder::class);
    }
}
