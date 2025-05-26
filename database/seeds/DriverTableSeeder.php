<?php

use Illuminate\Database\Seeder;

class DriverTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('driver')->delete();
        
        \DB::table('driver')->insert(array (
            0 => 
            array (
                'active' => 1,
                'driver' => 'local',
                'driver_id' => 1,
            ),
            1 => 
            array (
                'active' => 0,
                'driver' => 's3',
                'driver_id' => 2,
            ),
        ));
        
        
    }
}