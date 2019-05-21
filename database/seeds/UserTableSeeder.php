<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $role_admin = Role::where('name', 'Super Admin')->first();
        $admin = new User();
        $admin->first_name = 'John';
        $admin->last_name = 'Doe';
        $admin->middle_name = 'fake';
        $admin->username = 'admin';
        $admin->email = 'admin@admin.com';
        $admin->status = 'active';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $role_admission = Role::where('name', 'Admission Staff')->first();
        $admission = new User();
        $admission->first_name = 'Jane';
        $admission->last_name = 'Magalang';
        $admission->middle_name = 'Sicat';
        $admission->username = 'admission';
        $admission->email = 'admission@admission.com';
        $admission->status = 'active';
        $admission->password = bcrypt('admin');
        $admission->save();
        $admission->roles()->attach($role_admission);

        $role_faculty = Role::where('name', 'Faculty')->first();
        $faculty = new User();
        $faculty->first_name = 'Dave';
        $faculty->last_name = 'Sicat';
        $faculty->middle_name = 'Roque';
        $faculty->username = 'faculty';
        $faculty->email = 'faculty@faculty.com';
        $faculty->status = 'active';
        $faculty->password = bcrypt('admin');
        $faculty->save();
        $faculty->roles()->attach($role_faculty);

        $role_registrar = Role::where('name', 'Registrar Staff')->first();
        $registrar = new User();
        $registrar->first_name = 'Lovely';
        $registrar->last_name = 'Mendoza';
        $registrar->middle_name = 'Sicat';
        $registrar->username = 'registrar';
        $registrar->email = 'registrar@registrar.com';
        $registrar->status = 'active';
        $registrar->password = bcrypt('admin');
        $registrar->save();
        $registrar->roles()->attach($role_registrar);

        $role_guidance = Role::where('name', 'Guidance Staff')->first();
        $guidance = new User();
        $guidance->first_name = 'Michelle';
        $guidance->last_name = 'David';
        $guidance->middle_name = 'Lingat';
        $guidance->username = 'guidance';
        $guidance->email = 'guidance@guidance.com';
        $guidance->status = 'active';
        $guidance->password = bcrypt('admin');
        $guidance->save();
        $guidance->roles()->attach($role_guidance);

        $role_clinic = Role::where('name', 'Clinic Staff')->first();
        $clinic = new User();
        $clinic->first_name = 'Peter';
        $clinic->last_name = 'Cortez';
        $clinic->middle_name = 'Manalang';
        $clinic->username = 'clinic';
        $clinic->email = 'clinic@clinic.com';
        $clinic->status = 'active';
        $clinic->password = bcrypt('admin');
        $clinic->save();
        $clinic->roles()->attach($role_clinic);
    }
}
