<?php

use Illuminate\Database\Seeder;

class SupportStatusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('support_status')->delete();
        
        \DB::table('support_status')->insert(array (
            0 => 
            array (
                'id' => 4,
                'name' => 'Pending',
                'created_at' => '2018-05-11 12:31:42',
                'updated_at' => '2018-05-11 12:31:42',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'Solved',
                'created_at' => '2018-05-11 12:31:51',
                'updated_at' => '2018-05-11 12:31:51',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'Bug',
                'created_at' => '2018-05-11 12:32:00',
                'updated_at' => '2018-05-11 12:32:00',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}