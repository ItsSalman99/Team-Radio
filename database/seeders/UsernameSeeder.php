<?php

namespace Database\Seeders;

use App\Models\Username;
use Illuminate\Database\Seeder;

class UsernameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Username::count() == 0)
        {
            Username::create([
                'username' => '@salman12',
            ]);

            Username::create([
                'username' => '@salman11',
            ]);


            Username::create([
                'username' => '@salman123',
            ]);

        }
    }
}
