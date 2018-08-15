<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'display_name' => 'Administrator',
                'description' => 'Power user !',
                'created_at' => '2018-03-09 18:30:54',
                'updated_at' => '2018-03-09 18:30:54',
            ),
        ));
        
        
    }
}