<?php

namespace Database\Seeders;

use App\Models\ReportReasons;
use Illuminate\Database\Seeder;

class ReportReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(ReportReasons::count() == 0)
        {
            ReportReasons::create([
                'reason' => 'Fake Profile'
            ]);
            ReportReasons::create([
                'reason' => 'Unappropriate Messages'
            ]);
        }
    }
}
