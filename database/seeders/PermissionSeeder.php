<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $superAdmin = Role::findByName('Super Admin');
        $administrator = Role::findByName('Administrator');
        $developer = Role::findByName('Developer');
        $licenser = Role::findByName('Licenser');
        $support = Role::findByName('Support');

        $user = Permission::create(['name' => 'manage-user']);
        $client = Permission::create(['name' => 'manage-client']);
        $software = Permission::create(['name' => 'manage-software']);
        $ticket = Permission::create(['name' => 'manage-ticket']);
        $category = Permission::create(['name' => 'manage-category']);
        $status = Permission::create(['name' => 'manage-status']);
        $license = Permission::create(['name' => 'manage-license']);
        $extraDevTools = Permission::create(['name' => 'manage-tools']);
//        $role = Permission::create(['name' => 'manage-role']);

        $permissions = [$user, $client, $software, $ticket, $category, $status, $license, $extraDevTools];

        $support->syncPermissions([$ticket]);
        $licenser->syncPermissions([$license]);
        $developer->syncPermissions($permissions);
        $superAdmin->syncPermissions([$user, $client, $software, $ticket, $category, $status, $license]);
        $administrator->syncPermissions([$user, $client, $software, $ticket, $category, $status, $license]);

//    Super Admin - all access
//    Administrator - all access but should not be able to see the Super Admin in Users Management.
//    Developer - all access with additional accesses to extra dev tools in the system.
//    Licenser - can only access Licensing Module.
//    Support - can only access Trouble Ticket and Report Module.
    }
}
