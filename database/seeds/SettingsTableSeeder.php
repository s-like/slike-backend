<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'cur_version' => 'v3.0',
                'setting_id' => 1,
                'site_address' => '<p>India</p>',
                'site_email' => 'support@slike.com',
                'site_logo' => '55unYeWFux12ioY4POEYHPUZs3y0nlI485lxXcGa.png',
                'site_name' => 'Unify SoftTech',
                'site_phone' => '7878787878',
                'updated_at' => '2025-05-07 10:24:29',
                'watermark' => 'cl5wn4y7ijSi5cDHfkejZHFDq6foeZy6huyJwfAm.png',
            ),
        ));
        
        
    }
}