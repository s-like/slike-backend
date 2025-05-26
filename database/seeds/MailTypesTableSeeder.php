<?php

use Illuminate\Database\Seeder;

class MailTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mail_types')->delete();
        
        \DB::table('mail_types')->insert(array (
            0 => 
            array (
                'active' => 0,
                'mail_type' => 'SG',
                'mail_type_id' => 1,
                'name' => 'SendGrid',
            ),
            1 => 
            array (
                'active' => 0,
                'mail_type' => 'SM',
                'mail_type_id' => 2,
                'name' => 'SMTP',
            ),
        ));
        
        
    }
}