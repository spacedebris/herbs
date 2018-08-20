<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->delete();

        DB::table('profiles')->insert([
        	'user_id' => 1,
        	'address' => 'zwierzyniecka 37a', 
        	'postalcode' => '15-246',
        	'city' => 'Białystok',
        	'telephone' => '784902429',
        	'position' => 'admin',
        	'unit' => 'freelance'
        ]);
    }
}
