<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $hrManagerPermissions = [
            'list_employee',
            'get_employee_information',
            'add_employee',
            'change_employee_status',
           
        ];
        $hrRole = Role::updateOrCreate(['name'=>'hr_manager']);
        foreach ($hrManagerPermissions as $value) {
            
            $hrPermission = Permission::updateOrCreate(['name'=>$value]);
            $hrRole->givePermissionTo($hrPermission);

        }
        


        $employeeRole = Role::updateOrCreate(['name'=>'employee']);
        $employeePermission = Permission::updateOrCreate(['name'=>'update_contact']);
        $employeeRole->givePermissionTo($employeePermission);




    }
}
