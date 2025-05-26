<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'added_on' => '2020-12-09 12:45:51',
                'cat_id' => 2,
                'cat_name' => 'Bollywood Songs',
                'deleted' => 0,
                'parent_id' => NULL,
                'rank' => 1,
            ),
            1 => 
            array (
                'added_on' => '2020-12-09 12:46:14',
                'cat_id' => 4,
                'cat_name' => 'English',
                'deleted' => 0,
                'parent_id' => NULL,
                'rank' => 3,
            ),
            2 => 
            array (
                'added_on' => '2020-12-09 12:46:22',
                'cat_id' => 5,
                'cat_name' => 'Dialogs',
                'deleted' => 0,
                'parent_id' => NULL,
                'rank' => 4,
            ),
            3 => 
            array (
                'added_on' => '2020-12-09 12:46:56',
                'cat_id' => 6,
                'cat_name' => 'Hindi Songs',
                'deleted' => 0,
                'parent_id' => NULL,
                'rank' => 5,
            ),
        ));
        
        
    }
}