<?php

use Illuminate\Database\Seeder;

class SocialMediaLinksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('social_media_links')->delete();
        
        \DB::table('social_media_links')->insert(array (
            0 => 
            array (
                'fb_link' => 'https://www.facebook.com/',
                'google_link' => 'https://google.com',
                'social_media_link_id' => 1,
                'twitter_link' => 'https://twitter.com/',
                'youtube_link' => 'https://www.youtube.com/',
            ),
        ));
        
        
    }
}