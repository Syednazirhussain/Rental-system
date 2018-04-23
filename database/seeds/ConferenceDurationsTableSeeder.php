<?php

use Illuminate\Database\Seeder;

class ConferenceDurationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('conference_durations')->delete();
        
        \DB::table('conference_durations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'hour',
                'name' => 'Hour',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'multiple_days',
                'name' => 'Multiple Days',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'halfday_morning',
                'name' => 'Half-day Morning',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'halfday_afternoon',
                'name' => 'Half-day Afternoon',
            ),
        ));
        
        
    }
}