<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user = User::create([
            'name' => 'Jhun Norman Alonzo',
            'email' => 'alonzojhunnorman@gmail.com',
            'username' => 'alonzojhunnorman',
            'password' => bcrypt('admin123')
        ]);


       $role = Role::findByName('Super Admin');

       $user->assignRole($role);


        $user = User::create([
            'name' => 'Developer',
            'email' => 'developer@gmail.com',
            'username' => 'developer',
            'password' => bcrypt('admin123')
        ]);


        $role = Role::findByName('Developer');

        $user->assignRole($role);
    }
}
