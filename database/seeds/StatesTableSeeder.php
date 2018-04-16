<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'id' => 3395,
                'name' => 'Alvsborgs Lan',
                'country_id' => 211,
            ),
            1 => 
            array (
                'id' => 3396,
                'name' => 'Angermanland',
                'country_id' => 211,
            ),
            2 => 
            array (
                'id' => 3397,
                'name' => 'Blekinge',
                'country_id' => 211,
            ),
            3 => 
            array (
                'id' => 3398,
                'name' => 'Bohuslan',
                'country_id' => 211,
            ),
            4 => 
            array (
                'id' => 3399,
                'name' => 'Dalarna',
                'country_id' => 211,
            ),
            5 => 
            array (
                'id' => 3400,
                'name' => 'Gavleborg',
                'country_id' => 211,
            ),
            6 => 
            array (
                'id' => 3401,
                'name' => 'Gaza',
                'country_id' => 211,
            ),
            7 => 
            array (
                'id' => 3402,
                'name' => 'Gotland',
                'country_id' => 211,
            ),
            8 => 
            array (
                'id' => 3403,
                'name' => 'Halland',
                'country_id' => 211,
            ),
            9 => 
            array (
                'id' => 3404,
                'name' => 'Jamtland',
                'country_id' => 211,
            ),
            10 => 
            array (
                'id' => 3405,
                'name' => 'Jonkoping',
                'country_id' => 211,
            ),
            11 => 
            array (
                'id' => 3406,
                'name' => 'Kalmar',
                'country_id' => 211,
            ),
            12 => 
            array (
                'id' => 3407,
                'name' => 'Kristianstads',
                'country_id' => 211,
            ),
            13 => 
            array (
                'id' => 3408,
                'name' => 'Kronoberg',
                'country_id' => 211,
            ),
            14 => 
            array (
                'id' => 3409,
                'name' => 'Norrbotten',
                'country_id' => 211,
            ),
            15 => 
            array (
                'id' => 3410,
                'name' => 'Orebro',
                'country_id' => 211,
            ),
            16 => 
            array (
                'id' => 3411,
                'name' => 'Ostergotland',
                'country_id' => 211,
            ),
            17 => 
            array (
                'id' => 3412,
                'name' => 'Saltsjo-Boo',
                'country_id' => 211,
            ),
            18 => 
            array (
                'id' => 3413,
                'name' => 'Skane',
                'country_id' => 211,
            ),
            19 => 
            array (
                'id' => 3414,
                'name' => 'Smaland',
                'country_id' => 211,
            ),
            20 => 
            array (
                'id' => 3415,
                'name' => 'Sodermanland',
                'country_id' => 211,
            ),
            21 => 
            array (
                'id' => 3416,
                'name' => 'Stockholm',
                'country_id' => 211,
            ),
            22 => 
            array (
                'id' => 3417,
                'name' => 'Uppsala',
                'country_id' => 211,
            ),
            23 => 
            array (
                'id' => 3418,
                'name' => 'Varmland',
                'country_id' => 211,
            ),
            24 => 
            array (
                'id' => 3419,
                'name' => 'Vasterbotten',
                'country_id' => 211,
            ),
            25 => 
            array (
                'id' => 3420,
                'name' => 'Vastergotland',
                'country_id' => 211,
            ),
            26 => 
            array (
                'id' => 3421,
                'name' => 'Vasternorrland',
                'country_id' => 211,
            ),
            27 => 
            array (
                'id' => 3422,
                'name' => 'Vastmanland',
                'country_id' => 211,
            ),
            28 => 
            array (
                'id' => 3423,
                'name' => 'Vastra Gotaland',
                'country_id' => 211,
            ),
        ));
        
        
    }
}