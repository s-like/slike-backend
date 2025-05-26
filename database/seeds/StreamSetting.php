<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StreamSetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stream_setting')->insert([[
            'type' =>'AM',
            'alias' => 'ant-media',
            'name' => 'Ant Media'
        ],[
            'type' => 'A',
            'alias' => 'agora',
            'name' => 'Agora'
        ]]);
    }
}
