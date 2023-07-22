<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(User::count() == 0)
        {
            User::create([
                'first_name' => 'Mr.',
                'last_name' => 'Sheron',
                'username' => 'admin',
                'phone' => '0312456789',
                'email' => 'shenrondb07@gmail.com',
                'password' => Hash::make('123456'),
                'user_type' => 'admin'
            ]);
        }
    }
}
