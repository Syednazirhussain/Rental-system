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
                'country_id' => 2,
                'state_id' => 2,
                'city_id' => 2,
                'user_status_id' => 1,
                'uuid' => NULL,
                'remember_token' => 'mirAuDHrDNrple4NyMTrTLKKIkTTlwku6DVxfsNd7K0BhxVK2x79cQqpc3Jy',
                'created_at' => '2018-04-04 00:00:00',
                'updated_at' => '2018-04-04 17:50:17',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}