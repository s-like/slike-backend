<?php

use Illuminate\Database\Seeder;

class SoundsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sounds')->delete();
        
        \DB::table('sounds')->insert(array (
            0 => 
            array (
                'active' => 1,
                'album' => 'BodyGuard',
                'artist' => 'Salman Khan',
                'cat_id' => '2',
                'created_at' => '2025-05-07 09:57:18',
                'deleted' => 0,
                'duration' => 32,
                'image' => 'jkwBNUmDQJxkPiKomrc66kbM6MnulHvO1CbOfuwb.jpg',
                'parent_id' => 0,
                'sound_id' => 3318,
                'sound_name' => '1620381437.mp3',
                'tags' => NULL,
                'title' => 'Body_Guard',
                'used_times' => 0,
                'user_id' => 0,
            ),
            1 => 
            array (
                'active' => 1,
                'album' => 'Delhi Belly',
                'artist' => '',
                'cat_id' => '2',
                'created_at' => '2025-05-07 09:58:52',
                'deleted' => 0,
                'duration' => 15,
                'image' => '54PKLMXikjx0KDCHQSL8uep42oXxzF4qtvI7VpHE.jpg',
                'parent_id' => 0,
                'sound_id' => 3319,
                'sound_name' => '1620381532.mp3',
                'tags' => NULL,
                'title' => 'I Hate You Tere Pyaar NeDholak',
                'used_times' => 0,
                'user_id' => 0,
            ),
            2 => 
            array (
                'active' => 1,
                'album' => 'Forever',
                'artist' => '',
                'cat_id' => '4',
                'created_at' => '2025-05-07 10:00:29',
                'deleted' => 0,
                'duration' => 25,
                'image' => 'pXibCGwxdw02YmDrRiCBGZ14qCRZ22Fq3dP7ahwd.jpg',
                'parent_id' => 0,
                'sound_id' => 3320,
                'sound_name' => '1620381629.mp3',
                'tags' => NULL,
                'title' => 'Can We Kiss Forever',
                'used_times' => 0,
                'user_id' => 0,
            ),
            3 => 
            array (
                'active' => 1,
                'album' => 'Love Me',
                'artist' => '',
                'cat_id' => '4',
                'created_at' => '2025-05-07 10:01:25',
                'deleted' => 0,
                'duration' => 30,
                'image' => 'fLNu9mZDAAHNYJcdNK6YRJPvPVxmpzPidHZRhhW5.jpg',
                'parent_id' => 0,
                'sound_id' => 3321,
                'sound_name' => '1620381685.mp3',
                'tags' => NULL,
                'title' => 'love me like you do',
                'used_times' => 0,
                'user_id' => 0,
            ),
            4 => 
            array (
                'active' => 1,
                'album' => 'Ab Tak Chhappan 2',
                'artist' => '',
                'cat_id' => '5',
                'created_at' => '2025-05-07 10:02:39',
                'deleted' => 0,
                'duration' => 17,
                'image' => 'WG4pJKJeaLPOBCtwYRD86omWG9i41kHmmFK9tj7S.jpg',
                'parent_id' => 0,
                'sound_id' => 3322,
                'sound_name' => '1620381759.mp3',
                'tags' => NULL,
                'title' => 'Upar Wale Ne Insaan',
                'used_times' => 0,
                'user_id' => 0,
            ),
            5 => 
            array (
                'active' => 1,
                'album' => 'Bajirao Mastani',
                'artist' => '',
                'cat_id' => '5',
                'created_at' => '2025-05-07 10:03:24',
                'deleted' => 0,
                'duration' => 8,
                'image' => 'YBNZeToIP6ngoDDAOpL6dgQNmcXL7u5MQsgR4djs.jpg',
                'parent_id' => 0,
                'sound_id' => 3323,
                'sound_name' => '1620381803.mp3',
                'tags' => NULL,
                'title' => 'Baaz Ki Nazar',
                'used_times' => 0,
                'user_id' => 0,
            ),
        ));
        
        
    }
}