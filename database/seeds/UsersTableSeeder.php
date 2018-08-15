<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
use App\Permisions;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Marek Kozłowski';
        $user->email = 'kozlowskimarekami@gmail.com';
        $user->password = bcrypt('wiosna');        
        $user->save();

        $role = new Role();
        $role->name = 'Admin';
        $role->display_name = 'Administrator';
        $role->description = 'Power user !';
        $role->save();

        $user->roles()->attach(['1']);

        $role->permissions->attach(['1']);
    }
}
