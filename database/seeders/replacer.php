<?php
use Spatie\Permission\Models\Permission;

$fileReport = Permission::create(['name' => 'fileReport']);
$fileReportView = Permission::create(['name' => 'fileReport-view']);
$fileReportEdit = Permission::create(['name' => 'fileReport-edit']);
$fileReportUpdate = Permission::create(['name' => 'fileReport-update']);
$fileReportDelete = Permission::create(['name' => 'fileReport-delete']);
