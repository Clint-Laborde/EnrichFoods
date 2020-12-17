<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $coAdminRole = Role::where('name', 'CoAdmin')->first();
        $UserRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'phone' => '1333333333',
            'password'=> Hash::make('clking')
        ]);

        $coAdmin = User::create([
            'name' => 'CoAdmin User',
            'email' => 'CoAdmin@admin.com',
            'phone' => '2333333333',
            'password'=> Hash::make('clking')
        ]);

        $User = User::create([
            'name' => 'Generic User',
            'email' => 'user@user.com',
            'phone' => '4333333333',
            'password'=> Hash::make('clking')
        ]);

        $admin->roles()->attach($adminRole);
        $coAdmin->roles()->attach($coAdminRole);
        $User->roles()->attach($UserRole);


    }
}
