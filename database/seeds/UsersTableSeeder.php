<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'active' => 1,
                'active_status' => 0,
                'app_token' => '',
                'bio' => NULL,
                'country' => '',
                'created_at' => '2020-12-09 13:08:30',
                'dark_mode' => 0,
                'deleted' => 0,
                'dob' => NULL,
                'email' => 'demo@slike.com',
                'email_verified' => 1,
                'eula_agree' => 0,
                'fname' => 'Unify',
                'gender' => 'f',
                'ios_uuid' => '',
                'languages' => '',
                'last_active' => NULL,
                'lname' => 'Demo',
                'login_type' => 'O',
                'messenger_color' => '#2180f3',
                'mobile' => '7878787878',
                'password' => '$2y$10$cawJ9CPDiHpylmSTLQIlv.einZ/NHoz8Y9psPxNkHkRy118KqfyC2',
                'player_id' => '',
                'remember_token' => NULL,
                'time_zone' => '',
                'updated_at' => '2025-01-12 12:16:10',
                'user_dp' => 'skvnU81woJYv4zyp0dMVfW2NlF9iiWZ2FUOAdDaG.jpg',
                'user_id' => 5,
                'username' => 'unify',
                'verification_code' => '',
                'verification_time' => NULL,
            ),
            1 => 
            array (
                'active' => 1,
                'active_status' => 0,
                'app_token' => '',
                'bio' => NULL,
                'country' => '',
                'created_at' => '2020-12-09 13:09:43',
                'dark_mode' => 0,
                'deleted' => 0,
                'dob' => NULL,
                'email' => 'demo1@slike.com',
                'email_verified' => 1,
                'eula_agree' => 0,
                'fname' => 'Unify',
                'gender' => 'm',
                'ios_uuid' => '',
                'languages' => '',
                'last_active' => NULL,
                'lname' => 'SoftTech',
                'login_type' => 'O',
                'messenger_color' => '#2180f3',
                'mobile' => '7878787878',
                'password' => '$2y$10$JtNAK3/P3k4389kMUYY6c.yaSNhsN0H6J0XhdZNY75jgpDs12Xz2i',
                'player_id' => '',
                'remember_token' => NULL,
                'time_zone' => '',
                'updated_at' => '2020-12-09 13:09:43',
                'user_dp' => 'ygG3um6Z75Nlog3txcCuzXek10sW8p92aYBiO4c6.jpg',
                'user_id' => 6,
                'username' => 'unify1',
                'verification_code' => '',
                'verification_time' => NULL,
            ),
            2 => 
            array (
                'active' => 1,
                'active_status' => 0,
                'app_token' => '',
                'bio' => NULL,
                'country' => '',
                'created_at' => '2020-12-09 13:10:45',
                'dark_mode' => 0,
                'deleted' => 0,
                'dob' => NULL,
                'email' => 'demo2@slike.com',
                'email_verified' => 1,
                'eula_agree' => 0,
                'fname' => 'Demo',
                'gender' => 'f',
                'ios_uuid' => '',
                'languages' => '',
                'last_active' => NULL,
                'lname' => 'User1',
                'login_type' => 'O',
                'messenger_color' => '#2180f3',
                'mobile' => '7878787878',
                'password' => '$2y$10$uY8Tl88U4BAHxBmBbBoK6uDL2bLOQjcsOxSt2x0CkTTV2CK.Oo5hq',
                'player_id' => '',
                'remember_token' => NULL,
                'time_zone' => '',
                'updated_at' => '2025-01-12 12:18:27',
                'user_dp' => 'dfxpCO7e7AKPMYrJLAdkdDyzHJGnb0JkdJQL8Q8A.jpg',
                'user_id' => 7,
                'username' => 'unify2',
                'verification_code' => '',
                'verification_time' => NULL,
            ),
            3 => 
            array (
                'active' => 1,
                'active_status' => 0,
                'app_token' => '',
                'bio' => NULL,
                'country' => '',
                'created_at' => '2020-12-09 13:11:40',
                'dark_mode' => 0,
                'deleted' => 0,
                'dob' => NULL,
                'email' => 'demo3@slike.com',
                'email_verified' => 1,
                'eula_agree' => 0,
                'fname' => 'Unify',
                'gender' => 'm',
                'ios_uuid' => '',
                'languages' => '',
                'last_active' => NULL,
                'lname' => 'Tech',
                'login_type' => 'O',
                'messenger_color' => '#2180f3',
                'mobile' => '7878787878',
                'password' => '$2y$10$njXb24EZlH8vZXYKAL1FR./bMCovXJheyd4syu9D2ExY3v.ChjrxO',
                'player_id' => '',
                'remember_token' => NULL,
                'time_zone' => '',
                'updated_at' => '2020-12-09 13:11:40',
                'user_dp' => 'kuhfyHdMih2rsLt8C4LHMoUbuGi9liWIrgk93C1A.jpg',
                'user_id' => 8,
                'username' => 'unify3',
                'verification_code' => '',
                'verification_time' => NULL,
            ),
        ));
        
        
    }
}