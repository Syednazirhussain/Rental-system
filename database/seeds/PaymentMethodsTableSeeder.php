<?php

use Illuminate\Database\Seeder;

class PaymentMethodsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payment_methods')->delete();
        
        \DB::table('payment_methods')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'cheque',
                'name' => 'Cheque',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'bank',
                'name' => 'Bank Transfer',
            ),
        ));
        
        
    }
}