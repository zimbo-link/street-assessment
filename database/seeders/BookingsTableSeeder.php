<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\People;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
   
class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('bookings')->insert([[
            'property_id' => 1,
            'start_date' => '2020-08-26',
            'end_date' => '2020-09-02',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'property_id' => 1,
            'start_date' => '2020-12-06',
            'end_date' => '2020-12-13',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]]);
    }
}