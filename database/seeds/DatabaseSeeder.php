<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(UserStatusTableSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
        $this->call(DiscountTypeTableSeeder::class);

        $this->call(PaymentCyclesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
<<<<<<< HEAD
        

=======
        $this->call(GeneralSettingsTableSeeder::class);
>>>>>>> 452e23d2f6502e16b2d5fe9ab6d3f651e0033a2a
    }
}
