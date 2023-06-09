<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (\auth()->check()){
        $role = auth()->user()->getRoleNames()->first();
//        if ($role == 'Super Admin'){
//
//        }
        \RealRashid\SweetAlert\Facades\Alert::info("Welcome", "You are logged in!");
        return redirect()->route('super-admin.index');
    }else{
        return view('auth.login');
    }
});



//Client Contact Person
Route::get('/super-admin-client-edit-contact-person/{id}',
    [\App\Http\Controllers\SuperAdminClientController::class, 'editContactPerson'])
    ->name('super-admin-client.edit-contact-person');
Route::delete('/super-admin-client-delete-contact-person/{id}',
    [\App\Http\Controllers\SuperAdminClientController::class, 'destroyContactPerson'])
    ->name('super-admin-client.destroy-contact-person');
Route::put('/super-admin-client-update-contact-person/{id}',
    [\App\Http\Controllers\SuperAdminClientController::class, 'updateContactPerson'])
    ->name('super-admin-client.update-contact-person');
Route::post('/super-admin-client-store-contact-person/{id}',
    [\App\Http\Controllers\SuperAdminClientController::class, 'storeContactPerson'])
    ->name('super-admin-client.store-contact-person');


//Software Module
Route::get('/super-admin-software-create-software-module/{id}',
    [\App\Http\Controllers\SuperAdminSoftwareController::class, 'createSoftwareModule'])
    ->name('super-admin-software.create-software-module');
Route::post('/super-admin-software-store-software-module/{id}',
    [\App\Http\Controllers\SuperAdminSoftwareController::class, 'storeSoftwareModule'])
    ->name('super-admin-software.store-software-module');
Route::get('/super-admin-software-edit-software-module/{id}',
    [\App\Http\Controllers\SuperAdminSoftwareController::class, 'editSoftwareModule'])
    ->name('super-admin-software.edit-software-module');
Route::put('/super-admin-software-update-software-module/{id}',
    [\App\Http\Controllers\SuperAdminSoftwareController::class, 'updateSoftwareModule'])
    ->name('super-admin-software.update-software-module');
Route::delete('/super-admin-software-delete-software-module/{id}',
    [\App\Http\Controllers\SuperAdminSoftwareController::class, 'destroySoftwareModule'])
    ->name('super-admin-software.destroy-software-module');



//Software Requirements
Route::get('/super-admin-software-edit-software-requirement/{id}',
    [\App\Http\Controllers\SuperAdminSoftwareController::class, 'editSoftwareRequirement'])
    ->name('super-admin-software.edit-software-requirement');
Route::delete('/super-admin-software-delete-software-requirement/{id}',
    [\App\Http\Controllers\SuperAdminSoftwareController::class, 'destroySoftwareRequirement'])
    ->name('super-admin-software.destroy-software-requirement');
Route::put('/super-admin-software-update-software-requirement/{id}',
    [\App\Http\Controllers\SuperAdminSoftwareController::class, 'updateSoftwareRequirement'])
    ->name('super-admin-software.update-software-requirement');
Route::post('/super-admin-software-store-software-requirement/{id}',
    [\App\Http\Controllers\SuperAdminSoftwareController::class, 'storeSoftwareRequirement'])
    ->name('super-admin-software.store-software-requirement');



//Software Template
Route::get('/super-admin-software-create-software-template/{id}',
    [\App\Http\Controllers\SuperAdminSoftwareController::class, 'createSoftwareTemplate'])
    ->name('super-admin-software.create-software-template');
Route::post('/super-admin-software-store-software-template/{id}',
    [\App\Http\Controllers\SuperAdminSoftwareController::class, 'storeSoftwareTemplate'])
    ->name('super-admin-software.store-software-template');
Route::get('/super-admin-software-edit-software-template/{id}',
    [\App\Http\Controllers\SuperAdminSoftwareController::class, 'editSoftwareTemplate'])
    ->name('super-admin-software.edit-software-template');
Route::put('/super-admin-software-update-software-template/{id}',
    [\App\Http\Controllers\SuperAdminSoftwareController::class, 'updateSoftwareTemplate'])
    ->name('super-admin-software.update-software-template');
Route::delete('/super-admin-software-delete-software-template/{id}',
    [\App\Http\Controllers\SuperAdminSoftwareController::class, 'destroySoftwareTemplate'])
    ->name('super-admin-software.destroy-software-template');



//License Attribute
Route::get('/super-admin-license-create-attribute/{id}',
    [\App\Http\Controllers\SuperAdminLicenseController::class, 'createAttribute'])
    ->name('super-admin-license.create-attribute');
Route::post('/super-admin-license-store-attribute/{id}',
    [\App\Http\Controllers\SuperAdminLicenseController::class, 'storeAttribute'])
    ->name('super-admin-license.store-attribute');
Route::put('/super-admin-license.update-attribute/{id}',
    [\App\Http\Controllers\SuperAdminLicenseController::class, 'updateAttribute'])
    ->name('super-admin-license.update-attribute');
Route::delete('/super-admin-license-delete-attribute/{id}',
    [\App\Http\Controllers\SuperAdminLicenseController::class, 'destroyAttribute'])
    ->name('super-admin-license.destroy-attribute');
Route::get('/super-admin-license-edit-attribute/{id}',
    [\App\Http\Controllers\SuperAdminLicenseController::class, 'editAttribute'])
    ->name('super-admin-license.edit-attribute');



//Remote Access
Route::get('/super-admin-license-view-license/{id}',
    [\App\Http\Controllers\SuperAdminLicenseController::class, 'viewLicense'])
    ->name('super-admin-licence.view-license');
Route::get('/super-admin-license.edit-remote-access/{id}',
    [\App\Http\Controllers\SuperAdminLicenseController::class, 'editRemoteAccess'])
    ->name('super-admin-license.edit-remote-access');
Route::delete('/super-admin-license.delete-remote-access/{id}',
    [\App\Http\Controllers\SuperAdminLicenseController::class, 'destroyRemoteAccess'])
    ->name('super-admin-license.destroy-remote-access');
Route::put('/super-admin-license.update-remote-access/{id}',
    [\App\Http\Controllers\SuperAdminLicenseController::class, 'updateRemoteAccess'])
    ->name('super-admin-license.update-remote-access');
Route::post('/super-admin-license.store-remote-access/{id}',
    [\App\Http\Controllers\SuperAdminLicenseController::class, 'storeRemoteAccess'])
    ->name('super-admin-license.store-remote-access');




Route::resource('/super-admin-ticket', \App\Http\Controllers\SuperAdminTicketController::class);
Route::resource('/super-admin-client', \App\Http\Controllers\SuperAdminClientController::class);
Route::resource('/super-admin-software', \App\Http\Controllers\SuperAdminSoftwareController::class);
Route::resource('/super-admin-role', \App\Http\Controllers\SuperAdminRoleController::class);
Route::resource('/super-admin-permission', \App\Http\Controllers\SuperAdminPermissionController::class);
Route::resource('/super-admin-license', \App\Http\Controllers\SuperAdminLicenseController::class);
Route::resource('/super-admin-category', \App\Http\Controllers\SuperAdminCategoryController::class);
Route::resource('/super-admin-status', \App\Http\Controllers\SuperAdminStatusController::class);
Route::resource('/super-admin-user', \App\Http\Controllers\SuperAdminUserController::class);
Route::resource('/super-admin', \App\Http\Controllers\SuperAdminController::class);
Route::resource('/super-admin-report', \App\Http\Controllers\SuperAdminReportController::class);




Route::post('/super-admin-profile-update-password', [\App\Http\Controllers\ProfileController::class, 'updatePassword'])
    ->name('super-admin-profile.update-password');
Route::resource('/super-admin-profile', \App\Http\Controllers\ProfileController::class);

Auth::routes();



//Route::get('/home', function (){
//
//})->name('home');


