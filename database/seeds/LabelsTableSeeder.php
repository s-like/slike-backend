<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LabelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('labels')->delete();

        \DB::table('labels')->insert(array(
            0 =>
            array(
                'id' => 1,
                'label' => 'Following',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            1 =>
            array(
                'id' => 2,
                'label' => 'Featured',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            2 =>
            array(
                'id' => 3,
                'label' => 'No comment available',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            3 =>
            array(
                'id' => 4,
                'label' => 'My followers only',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            4 =>
            array(
                'id' => 5,
                'label' => 'Public',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            5 =>
            array(
                'id' => 6,
                'label' => 'Private',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            6 =>
            array(
                'id' => 7,
                'label' => 'Only Followers',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            7 =>
            array(
                'id' => 8,
                'label' => 'Block',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            8 =>
            array(
                'id' => 9,
                'label' => 'Unblock',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            9 =>
            array(
                'id' => 10,
                'label' => 'Conversations',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            10 =>
            array(
                'id' => 11,
                'label' => 'No Blocked Users',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            11 =>
            array(
                'id' => 12,
                'label' => 'No User Yet',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            12 =>
            array(
                'id' => 13,
                'label' => 'Blocked Users',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            13 =>
            array(
                'id' => 14,
                'label' => 'Current Password field is required!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            14 =>
            array(
                'id' => 15,
                'label' => 'Current Password',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            15 =>
            array(
                'id' => 16,
                'label' => 'New Password field is required!!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            16 =>
            array(
                'id' => 17,
                'label' => 'New Password',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            17 =>
            array(
                'id' => 18,
                'label' => 'Confirm Password field is required!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            18 =>
            array(
                'id' => 19,
                'label' => 'Password does not match!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            19 =>
            array(
                'id' => 20,
                'label' => 'Confirm Password',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            20 =>
            array(
                'id' => 21,
                'label' => 'Change Password',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            21 =>
            array(
                'id' => 22,
                'label' => 'Notifications',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            22 =>
            array(
                'id' => 23,
                'label' => 'Chat Setting',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            23 =>
            array(
                'id' => 24,
                'label' => 'Update',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            24 =>
            array(
                'id' => 25,
                'label' => 'My followers only',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            25 =>
            array(
                'id' => 26,
                'label' => 'Two way followings',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            26 =>
            array(
                'id' => 27,
                'label' => 'typing...',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            27 =>
            array(
                'id' => 28,
                'label' => 'is typing..',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            28 =>
            array(
                'id' => 29,
                'label' => 'Say something',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            29 =>
            array(
                'id' => 30,
                'label' => 'Registered Email Address',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            30 =>
            array(
                'id' => 31,
                'label' => 'No Recents',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            31 =>
            array(
                'id' => 32,
                'label' => 'Complete Profile',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            32 =>
            array(
                'id' => 33,
                'label' => 'PROFILE PICTURE',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            33 =>
            array(
                'id' => 34,
                'label' => 'Full Name',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            34 =>
            array(
                'id' => 35,
                'label' => 'Email Address',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            35 =>
            array(
                'id' => 36,
                'label' => 'Username',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            36 =>
            array(
                'id' => 37,
                'label' => 'Date of birth field is required!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            37 =>
            array(
                'id' => 38,
                'label' => 'Date of Birth',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            38 =>
            array(
                'id' => 39,
                'label' => 'Password',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            39 =>
            array(
                'id' => 40,
                'label' => 'Select Gender',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            40 =>
            array(
                'id' => 41,
                'label' => 'Search',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            41 =>
            array(
                'id' => 42,
                'label' => 'Chat',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            42 =>
            array(
                'id' => 43,
                'label' => 'People',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            43 =>
            array(
                'id' => 44,
                'label' => 'No conversation yet.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            44 =>
            array(
                'id' => 45,
                'label' => 'REPORT SUBMITTED!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            45 =>
            array(
                'id' => 46,
                'label' => 'REPORT',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            46 =>
            array(
                'id' => 47,
                'label' => 'Pending',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            47 =>
            array(
                'id' => 48,
                'label' => 'Verification Pending',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            48 =>
            array(
                'id' => 49,
                'label' => 'Select Type',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            49 =>
            array(
                'id' => 50,
                'label' => 'This field is required!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            50 =>
            array(
                'id' => 51,
                'label' => 'Description',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            51 =>
            array(
                'id' => 52,
                'label' => 'Submit',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            52 =>
            array(
                'id' => 53,
                'label' => 'Cancel',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            53 =>
            array(
                'id' => 54,
                'label' => 'Verified',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            54 =>
            array(
                'id' => 55,
                'label' => 'Rejected',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            55 =>
            array(
                'id' => 56,
                'label' => 'Email Verification',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            56 =>
            array(
                'id' => 57,
                'label' => 'Re-submit',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            57 =>
            array(
                'id' => 58,
                'label' => 'Please enter full name',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            58 =>
            array(
                'id' => 59,
                'label' => 'Not Applied',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            59 =>
            array(
                'id' => 60,
                'label' => 'Verified Already',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            60 =>
            array(
                'id' => 61,
                'label' => 'Thanks for reporting. If we find this content to be in violation of our Guidelines, we will remove it.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            61 =>
            array(
                'id' => 62,
                'label' => 'Tap again to exit an app.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            62 =>
            array(
                'id' => 63,
                'label' => 'Add a comment',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            63 =>
            array(
                'id' => 64,
                'label' => 'Delete Confirmation',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            64 =>
            array(
                'id' => 65,
                'label' => 'Do you really want to delete this comment',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            65 =>
            array(
                'id' => 66,
                'label' => 'Edit',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            66 =>
            array(
                'id' => 67,
                'label' => 'Delete',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            67 =>
            array(
                'id' => 68,
                'label' => 'My Videos',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            68 =>
            array(
                'id' => 69,
                'label' => 'Videos',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            69 =>
            array(
                'id' => 70,
                'label' => 'This is your feed of user you follow.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            70 =>
            array(
                'id' => 71,
                'label' => 'You can follow people or subscribe to hashtags.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            71 =>
            array(
                'id' => 72,
                'label' => 'Name field is required!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            72 =>
            array(
                'id' => 73,
                'label' => 'Please enter valid full name',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            73 =>
            array(
                'id' => 74,
                'label' => 'Address Field is required',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            74 =>
            array(
                'id' => 75,
                'label' => 'Front Side of ID document is required',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            75 =>
            array(
                'id' => 76,
                'label' => 'Enter Your Name',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            76 =>
            array(
                'id' => 77,
                'label' => 'Email field is required!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            77 =>
            array(
                'id' => 78,
                'label' => 'Please enter valid email',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            78 =>
            array(
                'id' => 79,
                'label' => 'Enter Email',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            79 =>
            array(
                'id' => 80,
                'label' => 'Username field is required!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            80 =>
            array(
                'id' => 81,
                'label' => 'Enter Username',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            81 =>
            array(
                'id' => 82,
                'label' => 'Mobile field is required!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            82 =>
            array(
                'id' => 83,
                'label' => 'Please enter valid mobile no',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            83 =>
            array(
                'id' => 84,
                'label' => 'Enter Mobile No.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            84 =>
            array(
                'id' => 85,
                'label' => 'Enter Bio (80 chars)',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            85 =>
            array(
                'id' => 86,
                'label' => 'Edit Profile',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            86 =>
            array(
                'id' => 87,
                'label' => 'Camera',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            87 =>
            array(
                'id' => 88,
                'label' => 'Gallery',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            88 =>
            array(
                'id' => 89,
                'label' => 'View Picture',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            89 =>
            array(
                'id' => 90,
                'label' => 'Name',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            90 =>
            array(
                'id' => 91,
                'label' => 'Email',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            91 =>
            array(
                'id' => 92,
                'label' => 'Gender',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            92 =>
            array(
                'id' => 93,
                'label' => 'Mobile',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            93 =>
            array(
                'id' => 94,
                'label' => 'DOB',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            94 =>
            array(
                'id' => 95,
                'label' => 'Bio',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            95 =>
            array(
                'id' => 96,
                'label' => 'Edit Post',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            96 =>
            array(
                'id' => 97,
                'label' => 'Description is required!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            97 =>
            array(
                'id' => 98,
                'label' => 'Enter Video Description',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            98 =>
            array(
                'id' => 99,
                'label' => 'Privacy Setting',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            99 =>
            array(
                'id' => 100,
                'label' => 'Followers',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            100 =>
            array(
                'id' => 101,
                'label' => 'You',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            101 =>
            array(
                'id' => 102,
                'label' => 'Follow',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            102 =>
            array(
                'id' => 103,
                'label' => 'Unfollow',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            103 =>
            array(
                'id' => 104,
                'label' => 'Forgot Password',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            104 =>
            array(
                'id' => 105,
                'label' => 'Send OTP',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            105 =>
            array(
                'id' => 106,
                'label' => 'Enter OTP',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            106 =>
            array(
                'id' => 107,
                'label' => 'OTP',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            107 =>
            array(
                'id' => 108,
                'label' => 'No record found',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            108 =>
            array(
                'id' => 109,
                'label' => 'Start Chat',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            109 =>
            array(
                'id' => 110,
                'label' => 'No Videos Found',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            110 =>
            array(
                'id' => 111,
                'label' => 'Logout',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            111 =>
            array(
                'id' => 112,
                'label' => 'Challenges',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            112 =>
            array(
                'id' => 113,
                'label' => 'Top Videos',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            113 =>
            array(
                'id' => 114,
                'label' => 'Recommended',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            114 =>
            array(
                'id' => 115,
                'label' => 'There is some error updating profile',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            115 =>
            array(
                'id' => 116,
                'label' => 'Tags',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            116 =>
            array(
                'id' => 117,
                'label' => 'Start:',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            117 =>
            array(
                'id' => 118,
                'label' => 'End:',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            118 =>
            array(
                'id' => 119,
                'label' => 'Yay!!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            119 =>
            array(
                'id' => 120,
                'label' => 'No Users Found',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            120 =>
            array(
                'id' => 121,
                'label' => 'Delete Profile',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            121 =>
            array(
                'id' => 122,
                'label' => 'OK',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            122 =>
            array(
                'id' => 123,
                'label' => 'Exit',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            123 =>
            array(
                'id' => 124,
                'label' => 'Close',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            124 =>
            array(
                'id' => 125,
                'label' => 'Unsupported Video Stream',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            125 =>
            array(
                'id' => 126,
                'label' => 'Video must contain at least one audio stream. You must turn on Microphone or select an music file form the music listing.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            126 =>
            array(
                'id' => 127,
                'label' => 'Do you really want to discard the video?',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            127 =>
            array(
                'id' => 128,
                'label' => 'Camera Error',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            128 =>
            array(
                'id' => 129,
                'label' => 'Camera Stopped Working !!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            129 =>
            array(
                'id' => 130,
                'label' => 'Enable wifi or mobile data',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            130 =>
            array(
                'id' => 131,
                'label' => 'Description is required!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            131 =>
            array(
                'id' => 132,
                'label' => 'Posts',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            132 =>
            array(
                'id' => 133,
                'label' => 'Likes',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            133 =>
            array(
                'id' => 134,
                'label' => 'Generating cover image',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            134 =>
            array(
                'id' => 135,
                'label' => 'Adding text filter and watermark...',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            135 =>
            array(
                'id' => 136,
                'label' => 'Adding watermark...',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            136 =>
            array(
                'id' => 137,
                'label' => 'Adding Text Filter',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            137 =>
            array(
                'id' => 138,
                'label' => 'Processing Video',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            138 =>
            array(
                'id' => 139,
                'label' => 'Followings',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            139 =>
            array(
                'id' => 140,
                'label' => 'There are some error to upload file',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            140 =>
            array(
                'id' => 141,
                'label' => 'Do you really want to delete the video',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            141 =>
            array(
                'id' => 142,
                'label' => 'Verification',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            142 =>
            array(
                'id' => 143,
                'label' => 'Blocked User',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            143 =>
            array(
                'id' => 144,
                'label' => 'App Version',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            144 =>
            array(
                'id' => 145,
                'label' => 'Notifications Setting',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            145 =>
            array(
                'id' => 146,
                'label' => 'Push Notification',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            146 =>
            array(
                'id' => 147,
                'label' => 'User follow you',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            147 =>
            array(
                'id' => 148,
                'label' => 'Comment on your video.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            148 =>
            array(
                'id' => 149,
                'label' => 'Like on your video',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            149 =>
            array(
                'id' => 150,
                'label' => 'There is no notification yet!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            150 =>
            array(
                'id' => 151,
                'label' => 'Sign In',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            151 =>
            array(
                'id' => 152,
                'label' => 'OR',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            152 =>
            array(
                'id' => 153,
                'label' => 'Reset Password',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            153 =>
            array(
                'id' => 154,
                'label' => 'Save',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            154 =>
            array(
                'id' => 155,
                'label' => 'Sign Up',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            155 =>
            array(
                'id' => 156,
                'label' => 'Full Name',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            156 =>
            array(
                'id' => 157,
                'label' => 'Your Name',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            157 =>
            array(
                'id' => 158,
                'label' => 'Continue',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            158 =>
            array(
                'id' => 159,
                'label' => 'Terms of use',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            159 =>
            array(
                'id' => 160,
                'label' => 'Privacy Policy',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            160 =>
            array(
                'id' => 161,
                'label' => 'Discover',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            161 =>
            array(
                'id' => 162,
                'label' => 'Favorites',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            162 =>
            array(
                'id' => 163,
                'label' => 'View More',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            163 =>
            array(
                'id' => 164,
                'label' => 'No Sounds found',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            164 =>
            array(
                'id' => 165,
                'label' => 'Used',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            165 =>
            array(
                'id' => 166,
                'label' => 'yes',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            166 =>
            array(
                'id' => 167,
                'label' => 'Report & Block',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            167 =>
            array(
                'id' => 168,
                'label' => 'Email field is not valid!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            168 =>
            array(
                'id' => 169,
                'label' => 'Error Registering User',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            169 =>
            array(
                'id' => 170,
                'label' => 'Confirm Password doesn\'t match!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            170 =>
            array(
                'id' => 171,
                'label' => 'Sign In with Apple failed!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            171 =>
            array(
                'id' => 172,
                'label' => 'Tap again to exit an app.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            172 =>
            array(
                'id' => 173,
                'label' => 'Please try Again with some other method.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            173 =>
            array(
                'id' => 174,
                'label' => 'Downloading.. Please wait...',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            174 =>
            array(
                'id' => 175,
                'label' => 'Unsupported platform iOS version. Please try some other login method.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            175 =>
            array(
                'id' => 176,
                'label' => 'Loading...',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            176 =>
            array(
                'id' => 177,
                'label' => 'No favourite sounds found',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            177 =>
            array(
                'id' => 178,
                'label' => 'Search favorite sound',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            178 =>
            array(
                'id' => 179,
                'label' => 'Already have an account. Sign in',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            179 =>
            array(
                'id' => 180,
                'label' => 'terms of use and confirm that you have read our privacy policy.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            180 =>
            array(
                'id' => 181,
                'label' => 'By continuing you agree to',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            181 =>
            array(
                'id' => 182,
                'label' => 'Don\'t have an account? Create an account',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            182 =>
            array(
                'id' => 183,
                'label' => 'Please enter your password!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            183 =>
            array(
                'id' => 184,
                'label' => 'Did not get OTP?',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            184 =>
            array(
                'id' => 185,
                'label' => 'Resend OTP',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            185 =>
            array(
                'id' => 186,
                'label' => 'Resend OTP in',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            186 =>
            array(
                'id' => 187,
                'label' => 'seconds',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            187 =>
            array(
                'id' => 188,
                'label' => 'Caution!!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            188 =>
            array(
                'id' => 189,
                'label' => 'Verify OTP',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            189 =>
            array(
                'id' => 190,
                'label' => 'Profile Verification',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            190 =>
            array(
                'id' => 191,
                'label' => 'Enter Your Name',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            191 =>
            array(
                'id' => 192,
                'label' => 'Enter Your Address',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            192 =>
            array(
                'id' => 193,
                'label' => 'Verify and Delete',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            193 =>
            array(
                'id' => 194,
                'label' => 'Error Verifying OTP',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            194 =>
            array(
                'id' => 195,
                'label' => 'Profile deletion will permanently delete user\'s profile and all its data, it can not be recovered in future. For confirmation we\'ll send an OTP to your registered email Id.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            195 =>
            array(
                'id' => 196,
                'label' => 'Email Already Exists',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            196 =>
            array(
                'id' => 197,
                'label' => 'Password updated Successfully',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            197 =>
            array(
                'id' => 198,
                'label' => 'Video deleted Successfully',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            198 =>
            array(
                'id' => 199,
                'label' => 'There\'s some error deleting video',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            199 =>
            array(
                'id' => 200,
                'label' => 'Some error to reset your password.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            200 =>
            array(
                'id' => 201,
                'label' => 'An OTP is sent to your email please check your email.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            201 =>
            array(
                'id' => 202,
                'label' => 'Sorry this email account does not exists.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            202 =>
            array(
                'id' => 203,
                'label' => 'Use another email to register or login using existing email.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            203 =>
            array(
                'id' => 204,
                'label' => 'STATUS',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            204 =>
            array(
                'id' => 205,
                'label' => 'Address',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            205 =>
            array(
                'id' => 206,
                'label' => 'Done',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            206 =>
            array(
                'id' => 207,
                'label' => 'First make few changes to save',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            207 =>
            array(
                'id' => 208,
                'label' => 'Exporting video',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            208 =>
            array(
                'id' => 209,
                'label' => 'Trimming Video',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            209 =>
            array(
                'id' => 210,
                'label' => 'Choose File',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            210 =>
            array(
                'id' => 211,
                'label' => 'Upload Front Side of Id Proof',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            211 =>
            array(
                'id' => 212,
                'label' => 'Supporting Document',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            212 =>
            array(
                'id' => 213,
                'label' => 'Upload Back Side of Id Proof',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            213 =>
            array(
                'id' => 214,
                'label' => 'Video success export!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            214 =>
            array(
                'id' => 215,
                'label' => '...Show more',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            215 =>
            array(
                'id' => 216,
                'label' => ' show less',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            216 =>
            array(
                'id' => 217,
                'label' => 'PM',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            217 =>
            array(
                'id' => 218,
                'label' => 'AM',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            218 =>
            array(
                'id' => 219,
                'label' => 'Skip',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            219 =>
            array(
                'id' => 220,
                'label' => 'just now',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            220 =>
            array(
                'id' => 221,
                'label' => 'It\'s spam',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            221 =>
            array(
                'id' => 222,
                'label' => 'It\'s inappropriate',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            222 =>
            array(
                'id' => 223,
                'label' => 'I don\'t like it',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            223 =>
            array(
                'id' => 224,
                'label' => 'There is some error',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            224 =>
            array(
                'id' => 225,
                'label' => 'Comment deleted Successfully',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            225 =>
            array(
                'id' => 226,
                'label' => 'There\'s some issue with the server',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            226 =>
            array(
                'id' => 227,
                'label' => 'Error on export video :(',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            227 =>
            array(
                'id' => 228,
                'label' => 'Apply For Profile Verification now',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            228 =>
            array(
                'id' => 229,
                'label' => 'Enter 6 digits verification code has sent in your registered email account.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            229 =>
            array(
                'id' => 230,
                'label' => 'Turn on all mobile notifications or select which to receive',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            230 =>
            array(
                'id' => 231,
                'label' => 'There is no network connection right now. check your internet connection',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            231 =>
            array(
                'id' => 232,
                'label' => 'Please enter an email address which associated with your account and, we will email you a link to reset your password.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            232 =>
            array(
                'id' => 233,
                'label' => 'Select Sound',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            233 =>
            array(
                'id' => 234,
                'label' => 'Your video is posted',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            234 =>
            array(
                'id' => 235,
                'label' => 'Agree',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            235 =>
            array(
                'id' => 236,
                'label' => 'Open',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            236 =>
            array(
                'id' => 237,
                'label' => 'Failed to get the timezone.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            237 =>
            array(
                'id' => 238,
                'label' => 'Facebook login failed!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            238 =>
            array(
                'id' => 239,
                'label' => 'is required!',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            239 =>
            array(
                'id' => 240,
                'label' => 'It must contain only _ . and alphanumeric',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            240 =>
            array(
                'id' => 241,
                'label' => 'Video Updated Successfully',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            241 =>
            array(
                'id' => 242,
                'label' => 'Verify OTP and delete profile. Profile deletion will permanently delete user\'s profile and all its data, it can not be recovered in future.',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            242 =>
            array(
                'id' => 243,
                'label' => 'Male',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            243 =>
            array(
                'id' => 244,
                'label' => 'Female',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            244 =>
            array(
                'id' => 245,
                'label' => 'Other',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            245 =>
            array(
                'id' => 246,
                'label' => 'Error',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            246 =>
            array(
                'id' => 247,
                'label' => 'There\'s some error loading video',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            247 =>
            array(
                'id' => 248,
                'label' => 'Video Flagged',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            248 =>
            array(
                'id' => 249,
                'label' => 'Languages',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            249 =>
            array(
                'id' => 250,
                'label' => 'English',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            250 =>
            array(
                'id' => 251,
                'label' => 'Spanish',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            251 =>
            array(
                'id' => 252,
                'label' => 'Catalan',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            252 =>
            array(
                'id' => 253,
                'label' => 'Language Updated Successfully',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            253 =>
            array(
                'id' => 254,
                'label' => 'Original Sound',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            254 =>
            array(
                'id' => 255,
                'label' => 'People',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            255 =>
            array(
                'id' => 256,
                'label' => 'All right reserved',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            256 =>
            array(
                'id' => 257,
                'label' => 'Upload Image',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            257 =>
            array(
                'id' => 258,
                'label' => 'You can choose option to upload image',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            258 =>
            array(
                'id' => 259,
                'label' => 'Data Deletion',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            259 =>
            array(
                'id' => 260,
                'label' => 'Review Our App',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            260 =>
            array(
                'id' => 261,
                'label' => 'Hey, enjoy me on Moooby...open this link and download the app',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            261 =>
            array(
                'id' => 262,
                'label' => 'Invite Your Friends',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            262 =>
            array(
                'id' => 263,
                'label' => 'Informations',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            263 =>
            array(
                'id' => 264,
                'label' => 'Update Application',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            264 =>
            array(
                'id' => 265,
                'label' => 'App Language',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            265 =>
            array(
                'id' => 266,
                'label' => 'Chat Settings',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            266 =>
            array(
                'id' => 267,
                'label' => 'Application Settings',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            267 =>
            array(
                'id' => 268,
                'label' => 'Discover People',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            268 =>
            array(
                'id' => 269,
                'label' => 'My QR Code',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            269 =>
            array(
                'id' => 270,
                'label' => 'Application Tools',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            270 =>
            array(
                'id' => 271,
                'label' => 'Account Settings',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            271 =>
            array(
                'id' => 272,
                'label' => 'Settings',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            272 =>
            array(
                'id' => 273,
                'label' => 'Frame the QR code',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            273 =>
            array(
                'id' => 274,
                'label' => 'Ok !Tap here and go to profile',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            274 =>
            array(
                'id' => 275,
                'label' => 'Scan QR Code',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            275 =>
            array(
                'id' => 276,
                'label' => 'Pause Cam',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            276 =>
            array(
                'id' => 277,
                'label' => 'Open Cam',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            277 =>
            array(
                'id' => 278,
                'label' => 'no Permission',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            278 =>
            array(
                'id' => 279,
                'label' => 'Update Now',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            279 =>
            array(
                'id' => 280,
                'label' => 'Back',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            280 =>
            array(
                'id' => 281,
                'label' => 'Current application version',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            281 =>
            array(
                'id' => 282,
                'label' => 'New update available',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
            282 =>
            array(
                'id' => 283,
                'label' => 'Update Application',
                'active' => 1,
                'created_at' => '2025-05-09 10:19:39',
                'updated_at' => '2025-05-09 10:19:39',
            ),
        ));
    }
}
