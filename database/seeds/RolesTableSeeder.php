<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;

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

    }
}