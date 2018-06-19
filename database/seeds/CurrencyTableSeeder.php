<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('currency')->delete();
        
        \DB::table('currency')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'USD',
                'name' => 'US Dollar',
                'created_at' => '2018-06-19 06:14:38',
                'updated_at' => '2018-06-19 06:14:38',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'SEK',
                'name' => 'Swedish Krona',
                'created_at' => '2018-06-19 06:15:17',
                'updated_at' => '2018-06-19 06:15:17',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'PK',
                'name' => 'Pakistani Rupee',
                'created_at' => '2018-06-19 06:15:50',
                'updated_at' => '2018-06-19 06:15:50',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}