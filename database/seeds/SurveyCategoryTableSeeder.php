<?php

use Illuminate\Database\Seeder;

class SurveyCategoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('survey_categories')->delete();
        
        \DB::table('survey_categories')->insert(array (
            0 => 
                array (
                    'id' => 1,
                    'name' => 'Rental Module',
                    'code' => 'rental_module',
                    'created_at' => '2018-06-14 15:03:37',
                    'updated_at' => '2018-06-14 15:03:40',
                    'deleted_at' => NULL,
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Conference Module',
                    'code' => 'conference_module',
                    'created_at' => '2018-06-14 15:03:37',
                    'updated_at' => '2018-06-14 15:03:40',
                    'deleted_at' => NULL,
                ),
        ));
        
        
    }
}