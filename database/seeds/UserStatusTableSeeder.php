<?php

use Illuminate\Database\Seeder;

class UserStatusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_status')->delete();
        
        \DB::table('user_status')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'active',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'deactive',
            ),
        ));
        
        
    }
}