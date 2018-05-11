<?php

use Illuminate\Database\Seeder;

class SupportPrioritiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('support_priorities')->delete();
        
        \DB::table('support_priorities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'sdf',
                'created_at' => '2018-05-10 15:15:39',
                'updated_at' => '2018-05-10 15:15:44',
                'deleted_at' => '2018-05-10 15:15:44',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'high',
                'created_at' => '2018-05-10 15:15:52',
                'updated_at' => '2018-05-10 15:24:01',
                'deleted_at' => '2018-05-10 15:24:01',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '3363',
                'created_at' => '2018-05-10 15:24:06',
                'updated_at' => '2018-05-10 15:25:11',
                'deleted_at' => '2018-05-10 15:25:11',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Low',
                'created_at' => '2018-05-11 12:29:59',
                'updated_at' => '2018-05-11 12:29:59',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Normal',
                'created_at' => '2018-05-11 12:30:08',
                'updated_at' => '2018-05-11 12:30:08',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Critical',
                'created_at' => '2018-05-11 12:30:17',
                'updated_at' => '2018-05-11 12:30:17',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}