<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('languages')->delete();

        \DB::table('languages')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'English',
                'code' => 'en',
                'active' => 1,
                'created_at' => '2025-05-09 10:34:11',
                'updated_at' => '2025-05-09 10:34:11',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Russian',
                'code' => 'ru',
                'active' => 1,
                'created_at' => '2025-05-09 10:34:11',
                'updated_at' => '2025-05-09 10:34:11',
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Norwegian',
                'code' => 'no',
                'active' => 1,
                'created_at' => '2025-05-09 10:34:43',
                'updated_at' => '2025-05-09 10:34:43',
            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'Spanish',
                'code' => 'es',
                'active' => 1,
                'created_at' => '2025-05-09 10:34:43',
                'updated_at' => '2025-05-09 10:34:43',
            ),
        ));
    }
}
