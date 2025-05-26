<?php

use Illuminate\Database\Seeder;

class HomeSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('home_settings')->delete();
        
        \DB::table('home_settings')->insert(array (
            0 => 
            array (
                'comments_per_page' => 10,
                'heading' => 'Set The World On Fire With Your',
                'home_setting_id' => 1,
                'home_top_background_img' => '',
                'img1' => 'VFG05wtFMYyoYD037ypRWK5gMQcevtf1dsXrDTWd.png',
                'img1_link' => '#',
                'img2' => 'louASKs8P7PFTWG5osTc1CLZ5jWNNbUWXF9bEh3p.png',
                'img2_link' => '#',
                'logo' => 'cZoqTTWIq2l9HKy9ynRO9KHBFX4TeRW38WpJ7yON.png',
            'main_color' => 'background: linear-gradient(left , rgb(115, 80, 199) 7% , rgb(236, 74, 99) 86%);
background: -o-linear-gradient(left , rgb(115, 80, 199) 7% , rgb(236, 74, 99) 86%);
background: -ms-linear-gradient(left , rgb(115, 80, 199) 7% , rgb(236, 74, 99) 86%);
background: -moz-linear-gradient(left , rgb(115, 80, 199) 7% , rgb(236, 74, 99) 86%);
background: -webkit-linear-gradient(left , rgb(115, 80, 199) 7% , rgb(236, 74, 99) 86%);',
                'site_title' => 'Slike V3.1',
                'sub_heading' => 'Unique Talent',
                'videos_per_page' => 12,
                'white_logo' => 'dio4IFUklz4Fn8F9KHc4f8F9erQo8IeQy39KbU2m.png',
            ),
        ));
        
        
    }
}