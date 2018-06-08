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
                'country_id' => 211,
                'state_id' => 3416,
                'city_id' => 39186,
                'profile_pic' => NULL,
                'user_status_id' => 1,
                'uuid' => NULL,
                'remember_token' => NULL,
                'created_at' => '2018-04-04 00:00:00',
                'updated_at' => '2018-05-09 09:23:12',
                'deleted_at' => NULL,
                'first_login' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Hassan',
                'email' => 'admin_tech_support@example.com',
                'password' => '$2y$10$EyYvexwSF/gAxkHkAP3.XuMKQi7aTKlfk7tDIH9eHjmKmQUM3mqJ.',
                'user_role_code' => 'admin_technical_support',
                'country_id' => NULL,
                'state_id' => NULL,
                'city_id' => NULL,
                'profile_pic' => NULL,
                'user_status_id' => 1,
                'uuid' => NULL,
                'remember_token' => NULL,
                'created_at' => '2018-05-09 09:22:34',
                'updated_at' => '2018-05-09 09:23:08',
                'deleted_at' => NULL,
                'first_login' => 1,
            ),
        ));
        
        
    }
}