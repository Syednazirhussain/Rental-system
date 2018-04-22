<?php

use Illuminate\Database\Seeder;

class GeneralSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('general_settings')->delete();
        
        \DB::table('general_settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'meta_key' => 'company_invoice_vat',
                'meta_value' => '25.00',
            ),
            1 => 
            array (
                'id' => 2,
                'meta_key' => 'vendor_info',
                'meta_value' => '{"title":"Crown Tower","zip_code":"021","address":"Gulshan-e-Iqbal block-11","country_id":"211","state_id":"3406","city_id":"39116","phone":"021-34690046","tax":"25","due_day":"10"}',
            ),
        ));
        
        
    }
}