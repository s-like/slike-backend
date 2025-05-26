<?php

use Illuminate\Database\Seeder;

class AppSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('app_settings')->delete();
        
        \DB::table('app_settings')->insert(array (
            0 => 
            array (
                'accent_color' => '#383737',
                'api_key' => 'testapikey',
                'api_user' => 'testapiuser',
                'app_setting_id' => 1,
                'bg_color' => '#000000',
                'button_color' => '#e83a63',
                'button_text_color' => '#ffffff',
                'dashboard_icon_background_color' => '',
                'dashboard_icon_color' => '#ffffff',
                'divider_color' => '#ffffff',
                'dp_border_color' => '#ffffff',
                'grid_border_radius' => '5',
                'grid_item_border_color' => '#ffffff',
                'heading_color' => '#ff9800',
                'icon_color' => '#ffffff',
                'inactive_button_color' => '#8c7777',
                'inactive_button_text_color' => '#ffffff',
                'my_msg_color' => '#0d7291',
                'my_msg_text_color' => '#ffffff',
                'sender_msg_color' => '#786c6c',
                'sender_msg_text_color' => '#ffffff',
                'sub_heading_color' => '#ffffff',
                'text_color' => '#ffffff',
                'video_time_limit' => '15,30,60',
            ),
        ));
        
        
    }
}