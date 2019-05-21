<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = new Role();
        $role1->name = 'Super Admin';
        $role1->save();

        $role2 = new Role();
        $role2->name = 'Faculty';
        $role2->save();

        $role3 = new Role();
        $role3->name = 'Registrar Staff';
        $role3->save();

        $role3 = new Role();
        $role3->name = 'Guidance Staff';
        $role3->save();

        $role4 = new Role();
        $role4->name = 'Admission Staff';
        $role4->save();

        $role5 = new Role();
        $role5->name = 'Clinic Staff';
        $role5->save();

        $role6 = new Role();
        $role6->name = 'Student';
        $role6->save();
    }
}
