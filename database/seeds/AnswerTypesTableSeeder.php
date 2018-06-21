<?php

use Illuminate\Database\Seeder;

class AnswerTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('answer_types')->delete();
        
        \DB::table('answer_types')->insert(array (
            0 => 
                array (
                    'id' => 1,
                    'name' => 'Open/Ended',
                    'code' => 'open_ended',
                    'created_at' => '2018-06-14 15:03:37',
                    'updated_at' => '2018-06-14 15:03:40',
                    'deleted_at' => NULL,
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Rating',
                    'code' => 'rating',
                    'created_at' => '2018-06-14 15:03:37',
                    'updated_at' => '2018-06-14 15:03:40',
                    'deleted_at' => NULL,
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Yes/No',
                    'code' => 'yes_no',
                    'created_at' => '2018-06-14 15:03:37',
                    'updated_at' => '2018-06-14 15:03:40',
                    'deleted_at' => NULL,
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'Optional',
                    'code' => 'optional',
                    'created_at' => '2018-06-14 15:03:37',
                    'updated_at' => '2018-06-14 15:03:40',
                    'deleted_at' => NULL,
                ),
        ));
        
        
    }
}