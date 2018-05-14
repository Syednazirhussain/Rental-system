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
                'id' => 4,
                'name' => 'Low',
                'created_at' => '2018-05-11 12:29:59',
                'updated_at' => '2018-05-11 12:29:59',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'Normal',
                'created_at' => '2018-05-11 12:30:08',
                'updated_at' => '2018-05-11 12:30:08',
                'deleted_at' => NULL,
            ),
            2 => 
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