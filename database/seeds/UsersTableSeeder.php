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
                'id' => 1,
                'name' => 'Faizan',
                'email' => 'admin@example.com',
                'password' => '$2y$10$EyYvexwSF/gAxkHkAP3.XuMKQi7aTKlfk7tDIH9eHjmKmQUM3mqJ.',
                'user_role_code' => 'admin',
                'permissions' => NULL,
                'country_id' => 211,
                'state_id' => 3416,
                'city_id' => 39186,
                'profile_pic' => NULL,
                'user_status_id' => 1,
                'uuid' => NULL,
                'remember_token' => 'FYe8VyOQEpH4xktJUoNL9VuTXjrKkQyenm46DwJfVVIL8gRPNz2G6X3s3gbX',
                'created_at' => '2018-04-04 00:00:00',
                'updated_at' => '2018-05-09 09:23:12',
                'deleted_at' => NULL,
                'first_login' => 1,
            ),
            1 => 
            array (
                'id' => 24,
                'name' => 'Hassan',
                'email' => 'hassan.prince17@yahoo.com',
                'password' => '$2y$10$NVDGJVuhJ.emH.l.MIe08uBG00PPDu11DBH./ERMWlnbR4YPxMf1.',
                'user_role_code' => 'admin_technical_support',
                'permissions' => NULL,
                'country_id' => NULL,
                'state_id' => NULL,
                'city_id' => NULL,
                'profile_pic' => NULL,
                'user_status_id' => 1,
                'uuid' => NULL,
                'remember_token' => 'ipWkO2AM1Aa8aQP80pl7Ek42NY3sYCRcaNBPlaANGDcISvWrTutn1iGWS7tI',
                'created_at' => '2018-05-09 09:22:34',
                'updated_at' => '2018-05-09 09:23:08',
                'deleted_at' => NULL,
                'first_login' => 1,
            ),
        ));
        
        
    }
}