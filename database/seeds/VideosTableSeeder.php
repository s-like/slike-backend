<?php

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('videos')->delete();
        
        \DB::table('videos')->insert(array (
            0 => 
            array (
                'active' => 1,
                'created_at' => '2025-05-07 11:24:05',
                'deleted' => 0,
                'description' => 'Slike Dummy Video-1',
                'duration' => 8,
                'enabled' => 1,
                'flag' => 0,
                'gif' => '1620386641.gif',
                'location' => '',
                'master_video' => '',
                'privacy' => 0,
                'sound_id' => 3323,
                'tags' => '',
                'thumb' => '1620386641.jpg',
                'title' => 'Slike Dummy Video-1',
                'total_comments' => 0,
                'total_likes' => 0,
                'total_report' => 0,
                'total_views' => 0,
                'updated_at' => '2025-05-07 11:24:05',
                'user_id' => 5,
                'video' => '1620386641/1.mp4',
                'video_id' => 39,
            ),
            1 => 
            array (
                'active' => 1,
                'created_at' => '2025-05-07 11:24:38',
                'deleted' => 0,
                'description' => 'Slike Dummy Video-2',
                'duration' => 12,
                'enabled' => 1,
                'flag' => 0,
                'gif' => '1620386670.gif',
                'location' => '',
                'master_video' => '',
                'privacy' => 0,
                'sound_id' => 3318,
                'tags' => '',
                'thumb' => '1620386670.jpg',
                'title' => 'Slike Dummy Video-2',
                'total_comments' => 0,
                'total_likes' => 0,
                'total_report' => 0,
                'total_views' => 0,
                'updated_at' => '2025-05-07 11:24:38',
                'user_id' => 6,
                'video' => '1620386670/2.mp4',
                'video_id' => 40,
            ),
            2 => 
            array (
                'active' => 1,
                'created_at' => '2025-05-07 11:26:01',
                'deleted' => 0,
                'description' => 'Slike Dummy Video-3',
                'duration' => 3,
                'enabled' => 1,
                'flag' => 0,
                'gif' => '1620386757.gif',
                'location' => '',
                'master_video' => '',
                'privacy' => 0,
                'sound_id' => 3320,
                'tags' => '',
                'thumb' => '1620386757.jpg',
                'title' => 'Slike Dummy Video-3',
                'total_comments' => 0,
                'total_likes' => 0,
                'total_report' => 0,
                'total_views' => 0,
                'updated_at' => '2025-05-07 11:26:01',
                'user_id' => 7,
                'video' => '1620386757/3.mp4',
                'video_id' => 41,
            ),
        ));
        
        
    }
}