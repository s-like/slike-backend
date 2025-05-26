<?php

use Illuminate\Database\Seeder;

class AppLoginPageTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('app_login_page')->delete();
        
        \DB::table('app_login_page')->insert(array (
            0 => 
            array (
                'app_login_page_id' => 1,
                'apple_login' => 0,
                'background_img' => '6OzlUzCahRhkrLxO4z1ks7YHm1LgNf17TfoTYl3F.png',
                'description' => 'Create New Account',
                'fb_login' => 0,
                'google_login' => 0,
                'logo' => 'sZY4tzMrUN2Kj4h5atBiwv7sTfan2F8JocYuWcej.png',
                'privacy_policy' => 'By Signing in your agree with Slike Terms of Service use and Privacy Policy',
                'title' => 'Sign Up For Slike',
            ),
        ));
        
        
    }
}