<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin')->delete();
        
        \DB::table('admin')->insert(array (
            0 => 
            array (
                'admin_id' => 3,
                'created_at' => '2019-06-20 11:26:10',
                'email' => 'support@slike.com',
                'name' => 'admin',
                'password' => '$2y$10$vhTsG97FHYrdVAvEDyZEf.irGwfZV2/TvWdbf7MZqjYwkjhRszYFu',
                'remember_token' => NULL,
                'updated_at' => '2019-06-20 11:26:10',
            ),
        ));
        
        
    }
}