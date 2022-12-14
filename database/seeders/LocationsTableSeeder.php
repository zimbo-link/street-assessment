<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\People;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
   
class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('locations')->insert([[
            'id' => 1,
            'location_name' => 'Cornwall',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'id' => 2,
            'location_name' => 'Lake District',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'id' => 3,
            'location_name' => 'Yorkshire',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'id' => 4,
            'location_name' => 'Wales',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'id' => 5,
            'location_name' => 'Scotland',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]]);
    }
}