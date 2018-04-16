<?php

use Illuminate\Database\Seeder;

class PaymentCyclesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payment_cycles')->delete();
        
        \DB::table('payment_cycles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Monthly',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Quaterly',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Half Yearly',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Annually',
            ),
        ));
        
        
    }
}