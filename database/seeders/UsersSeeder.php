<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'firstHr',
            'password'=>bcrypt('asd123') ,
            'email'=>'hr_email@chainReaction.com',
            'contact_details'=>'009627999999999999',
            'job_title'=>'HR coordinator',
            'type'=>'hr_manager',
            'status'=>true
        ]);
        
        $user->assignRole('hr_manager');
    }
}
