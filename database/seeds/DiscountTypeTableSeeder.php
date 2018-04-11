<?php

use Illuminate\Database\Seeder;

class DiscountTypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('discount_type')->delete();
        
        \DB::table('discount_type')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Fixed Price',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Percentage',
            ),
        ));
        
        
    }
}