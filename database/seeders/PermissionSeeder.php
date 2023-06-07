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

//        $superAdmin = Role::findByName('Super Admin');
//        $administrator = Role::findByName('Administrator');
//        $developer = Role::findByName('Developer');
//        $licenser = Role::findByName('Licenser');
//        $support = Role::findByName('Support');
//
        $user = Permission::create(['name' => 'user']);
        $userView = Permission::create(['name' => 'user-view']);
        $userEdit = Permission::create(['name' => 'user-edit']);
        $userUpdate = Permission::create(['name' => 'user-update']);
        $userDelete = Permission::create(['name' => 'user-delete']);

        $client = Permission::create(['name' => 'client']);
        $clientView = Permission::create(['name' => 'client-view']);
        $clientEdit = Permission::create(['name' => 'client-edit']);
        $clientUpdate = Permission::create(['name' => 'client-update']);
        $clientDelete = Permission::create(['name' => 'client-delete']);

        $software = Permission::create(['name' => 'software']);
        $softwareView = Permission::create(['name' => 'software-view']);
        $softwareEdit = Permission::create(['name' => 'software-edit']);
        $softwareUpdate = Permission::create(['name' => 'software-update']);
        $softwareDelete = Permission::create(['name' => 'software-delete']);


        $ticket = Permission::create(['name' => 'ticket']);
        $ticketView = Permission::create(['name' => 'ticket-view']);
        $ticketEdit = Permission::create(['name' => 'ticket-edit']);
        $ticketUpdate = Permission::create(['name' => 'ticket-update']);
        $ticketDelete = Permission::create(['name' => 'ticket-delete']);

        $category = Permission::create(['name' => 'category']);
        $categoryView = Permission::create(['name' => 'category-view']);
        $categoryEdit = Permission::create(['name' => 'category-edit']);
        $categoryUpdate = Permission::create(['name' => 'category-update']);
        $categoryDelete = Permission::create(['name' => 'category-delete']);


        $status = Permission::create(['name' => 'status']);
        $statusView = Permission::create(['name' => 'status-view']);
        $statusEdit = Permission::create(['name' => 'status-edit']);
        $statusUpdate = Permission::create(['name' => 'status-update']);
        $statusDelete = Permission::create(['name' => 'status-delete']);


        $license = Permission::create(['name' => 'license']);
        $licenseView = Permission::create(['name' => 'license-view']);
        $licenseEdit = Permission::create(['name' => 'license-edit']);
        $licenseUpdate = Permission::create(['name' => 'license-update']);
        $licenseDelete = Permission::create(['name' => 'license-delete']);

        $fileReport = Permission::create(['name' => 'fileReport']);
        $fileReportView = Permission::create(['name' => 'fileReport-view']);
        $fileReportEdit = Permission::create(['name' => 'fileReport-edit']);
        $fileReportUpdate = Permission::create(['name' => 'fileReport-update']);
        $fileReportDelete = Permission::create(['name' => 'fileReport-delete']);

        $extraDevTools = Permission::create(['name' => 'extra-dev-tools']);
//
//        $superAdmin->syncPermissions(Permission::whereNotIn('name', $extraDevTools)->get());
//        $administrator->syncPermissions(Permission::whereNotIn('name', $extraDevTools)->get());
//        $developer->syncPermissions(Permission::all());
//        $licenser->syncPermissions([$license, $licenseView, $licenseEdit, $licenseUpdate, $licenseDelete]);
//        $support->syncPermissions([$ticket, $ticketView, $ticketEdit, $ticketUpdate, $ticketDelete, $fileReport, $fileReportView, $fileReportEdit, $fileReportUpdate, $fileReportDelete]);

//    Super Admin - all access
//    Administrator - all access but should not be able to see the Super Admin in Users Management.
//    Developer - all access with additional accesses to extra dev tools in the system.
//    Licenser - can only access Licensing Module.
//    Support - can only access Trouble Ticket and Report Module.
    }
}
