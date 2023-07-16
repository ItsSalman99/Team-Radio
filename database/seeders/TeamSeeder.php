<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Team::count() == 0) {
            Team::create([
                'name' => 'Team 1'
            ]);

            Team::create([
                'name' => 'Team 2'
            ]);

            Team::create([
                'name' => 'Team 3'
            ]);

            Team::create([
                'name' => 'Team 4'
            ]);
        }
    }
}
