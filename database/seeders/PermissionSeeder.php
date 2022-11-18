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
        $hrRole = Role::create(['name'=>'hr_manager']);
        foreach ($hrManagerPermissions as $value) {
            
            $hrPermission = Permission::create(['name'=>$value]);
            $hrRole->givePermissionTo($hrPermission);

        }
        


        $employeeRole = Role::create(['name'=>'employee']);
        $employeePermission = Permission::create(['name'=>'update_contact']);
        $employeeRole->givePermissionTo($employeePermission);




    }
}
