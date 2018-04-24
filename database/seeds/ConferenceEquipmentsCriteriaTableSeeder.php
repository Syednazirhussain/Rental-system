<?php

use Illuminate\Database\Seeder;

class ConferenceEquipmentsCriteriaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('conference_equipments_criteria')->delete();
        
        \DB::table('conference_equipments_criteria')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'per_booking',
                'title' => 'Per booking',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'per_hour',
                'title' => 'Per Hour',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}