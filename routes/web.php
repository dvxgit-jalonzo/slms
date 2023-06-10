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
        \RealRashid\SweetAlert\Facades\Alert::info("Welcome", "You are logged in!");
        if ($role == 'Super Admin'){
            return redirect()->route('super-admin.index');
        }else if ($role == "Developer"){
            return redirect()->route('developer.index');
        }else if ($role == "Licenser"){
            return redirect()->route('licenser.index');
        }else if ($role == "Support"){
            return redirect()->route('support.index');
        }else if ($role == "Administrator"){
            return redirect()->route('administrator.index');
        }
    }else{
        return view('auth.login');
    }
});


Route::group(['middleware' => ['role:Administrator']], function (){
    //Client Contact Person
    Route::get('/administrator-client-edit-contact-person/{id}',
        [\App\Http\Controllers\AdministratorClientController::class, 'editContactPerson'])
        ->name('administrator-client.edit-contact-person');
    Route::delete('/administrator-client-delete-contact-person/{id}',
        [\App\Http\Controllers\AdministratorClientController::class, 'destroyContactPerson'])
        ->name('administrator-client.destroy-contact-person');
    Route::put('/administrator-client-update-contact-person/{id}',
        [\App\Http\Controllers\AdministratorClientController::class, 'updateContactPerson'])
        ->name('administrator-client.update-contact-person');
    Route::post('/administrator-client-store-contact-person/{id}',
        [\App\Http\Controllers\AdministratorClientController::class, 'storeContactPerson'])
        ->name('administrator-client.store-contact-person');


//Software Module
    Route::get('/administrator-software-create-software-module/{id}',
        [\App\Http\Controllers\AdministratorSoftwareController::class, 'createSoftwareModule'])
        ->name('administrator-software.create-software-module');
    Route::post('/administrator-software-store-software-module/{id}',
        [\App\Http\Controllers\AdministratorSoftwareController::class, 'storeSoftwareModule'])
        ->name('administrator-software.store-software-module');
    Route::get('/administrator-software-edit-software-module/{id}',
        [\App\Http\Controllers\AdministratorSoftwareController::class, 'editSoftwareModule'])
        ->name('administrator-software.edit-software-module');
    Route::put('/administrator-software-update-software-module/{id}',
        [\App\Http\Controllers\AdministratorSoftwareController::class, 'updateSoftwareModule'])
        ->name('administrator-software.update-software-module');
    Route::delete('/administrator-software-delete-software-module/{id}',
        [\App\Http\Controllers\AdministratorSoftwareController::class, 'destroySoftwareModule'])
        ->name('administrator-software.destroy-software-module');



//Software Requirements
    Route::get('/administrator-software-edit-software-requirement/{id}',
        [\App\Http\Controllers\AdministratorSoftwareController::class, 'editSoftwareRequirement'])
        ->name('administrator-software.edit-software-requirement');
    Route::delete('/administrator-software-delete-software-requirement/{id}',
        [\App\Http\Controllers\AdministratorSoftwareController::class, 'destroySoftwareRequirement'])
        ->name('administrator-software.destroy-software-requirement');
    Route::put('/administrator-software-update-software-requirement/{id}',
        [\App\Http\Controllers\AdministratorSoftwareController::class, 'updateSoftwareRequirement'])
        ->name('administrator-software.update-software-requirement');
    Route::post('/administrator-software-store-software-requirement/{id}',
        [\App\Http\Controllers\AdministratorSoftwareController::class, 'storeSoftwareRequirement'])
        ->name('administrator-software.store-software-requirement');



//Software Template
    Route::get('/administrator-software-create-software-template/{id}',
        [\App\Http\Controllers\AdministratorSoftwareController::class, 'createSoftwareTemplate'])
        ->name('administrator-software.create-software-template');
    Route::post('/administrator-software-store-software-template/{id}',
        [\App\Http\Controllers\AdministratorSoftwareController::class, 'storeSoftwareTemplate'])
        ->name('administrator-software.store-software-template');
    Route::get('/administrator-software-edit-software-template/{id}',
        [\App\Http\Controllers\AdministratorSoftwareController::class, 'editSoftwareTemplate'])
        ->name('administrator-software.edit-software-template');
    Route::put('/administrator-software-update-software-template/{id}',
        [\App\Http\Controllers\AdministratorSoftwareController::class, 'updateSoftwareTemplate'])
        ->name('administrator-software.update-software-template');
    Route::delete('/administrator-software-delete-software-template/{id}',
        [\App\Http\Controllers\AdministratorSoftwareController::class, 'destroySoftwareTemplate'])
        ->name('administrator-software.destroy-software-template');



//License Attribute
    Route::get('/administrator-license-create-attribute/{id}',
        [\App\Http\Controllers\AdministratorLicenseController::class, 'createAttribute'])
        ->name('administrator-license.create-attribute');
    Route::post('/administrator-license-store-attribute/{id}',
        [\App\Http\Controllers\AdministratorLicenseController::class, 'storeAttribute'])
        ->name('administrator-license.store-attribute');
    Route::put('/administrator-license.update-attribute/{id}',
        [\App\Http\Controllers\AdministratorLicenseController::class, 'updateAttribute'])
        ->name('administrator-license.update-attribute');
    Route::delete('/administrator-license-delete-attribute/{id}',
        [\App\Http\Controllers\AdministratorLicenseController::class, 'destroyAttribute'])
        ->name('administrator-license.destroy-attribute');
    Route::get('/administrator-license-edit-attribute/{id}',
        [\App\Http\Controllers\AdministratorLicenseController::class, 'editAttribute'])
        ->name('administrator-license.edit-attribute');



//Remote Access
    Route::get('/administrator-license-view-license/{id}',
        [\App\Http\Controllers\AdministratorLicenseController::class, 'viewLicense'])
        ->name('administrator-licence.view-license');
    Route::get('/administrator-license.edit-remote-access/{id}',
        [\App\Http\Controllers\AdministratorLicenseController::class, 'editRemoteAccess'])
        ->name('administrator-license.edit-remote-access');
    Route::delete('/administrator-license.delete-remote-access/{id}',
        [\App\Http\Controllers\AdministratorLicenseController::class, 'destroyRemoteAccess'])
        ->name('administrator-license.destroy-remote-access');
    Route::put('/administrator-license.update-remote-access/{id}',
        [\App\Http\Controllers\AdministratorLicenseController::class, 'updateRemoteAccess'])
        ->name('administrator-license.update-remote-access');
    Route::post('/administrator-license.store-remote-access/{id}',
        [\App\Http\Controllers\AdministratorLicenseController::class, 'storeRemoteAccess'])
        ->name('administrator-license.store-remote-access');




    Route::resource('/administrator-ticket', \App\Http\Controllers\AdministratorTicketController::class);
    Route::resource('/administrator-client', \App\Http\Controllers\AdministratorClientController::class);
    Route::resource('/administrator-software', \App\Http\Controllers\AdministratorSoftwareController::class);


    Route::resource('/administrator-role', \App\Http\Controllers\AdministratorRoleController::class);
    Route::resource('/administrator-permission', \App\Http\Controllers\AdministratorPermissionController::class);
    Route::resource('/administrator-license', \App\Http\Controllers\AdministratorLicenseController::class);
    Route::resource('/administrator-category', \App\Http\Controllers\AdministratorCategoryController::class);
    Route::resource('/administrator-status', \App\Http\Controllers\AdministratorStatusController::class);
    Route::resource('/administrator-user', \App\Http\Controllers\AdministratorUserController::class);
    Route::resource('/administrator', \App\Http\Controllers\AdministratorController::class);
});

Route::group(['middleware' => ['role:Developer']], function (){
    //Client Contact Person
    Route::get('/developer-client-edit-contact-person/{id}',
        [\App\Http\Controllers\DeveloperClientController::class, 'editContactPerson'])
        ->name('developer-client.edit-contact-person');
    Route::delete('/developer-client-delete-contact-person/{id}',
        [\App\Http\Controllers\DeveloperClientController::class, 'destroyContactPerson'])
        ->name('developer-client.destroy-contact-person');
    Route::put('/developer-client-update-contact-person/{id}',
        [\App\Http\Controllers\DeveloperClientController::class, 'updateContactPerson'])
        ->name('developer-client.update-contact-person');
    Route::post('/developer-client-store-contact-person/{id}',
        [\App\Http\Controllers\DeveloperClientController::class, 'storeContactPerson'])
        ->name('developer-client.store-contact-person');


//Software Module
    Route::get('/developer-software-create-software-module/{id}',
        [\App\Http\Controllers\DeveloperSoftwareController::class, 'createSoftwareModule'])
        ->name('developer-software.create-software-module');
    Route::post('/developer-software-store-software-module/{id}',
        [\App\Http\Controllers\DeveloperSoftwareController::class, 'storeSoftwareModule'])
        ->name('developer-software.store-software-module');
    Route::get('/developer-software-edit-software-module/{id}',
        [\App\Http\Controllers\DeveloperSoftwareController::class, 'editSoftwareModule'])
        ->name('developer-software.edit-software-module');
    Route::put('/developer-software-update-software-module/{id}',
        [\App\Http\Controllers\DeveloperSoftwareController::class, 'updateSoftwareModule'])
        ->name('developer-software.update-software-module');
    Route::delete('/developer-software-delete-software-module/{id}',
        [\App\Http\Controllers\DeveloperSoftwareController::class, 'destroySoftwareModule'])
        ->name('developer-software.destroy-software-module');



//Software Requirements
    Route::get('/developer-software-edit-software-requirement/{id}',
        [\App\Http\Controllers\DeveloperSoftwareController::class, 'editSoftwareRequirement'])
        ->name('developer-software.edit-software-requirement');
    Route::delete('/developer-software-delete-software-requirement/{id}',
        [\App\Http\Controllers\DeveloperSoftwareController::class, 'destroySoftwareRequirement'])
        ->name('developer-software.destroy-software-requirement');
    Route::put('/developer-software-update-software-requirement/{id}',
        [\App\Http\Controllers\DeveloperSoftwareController::class, 'updateSoftwareRequirement'])
        ->name('developer-software.update-software-requirement');
    Route::post('/developer-software-store-software-requirement/{id}',
        [\App\Http\Controllers\DeveloperSoftwareController::class, 'storeSoftwareRequirement'])
        ->name('developer-software.store-software-requirement');



//Software Template
    Route::get('/developer-software-create-software-template/{id}',
        [\App\Http\Controllers\DeveloperSoftwareController::class, 'createSoftwareTemplate'])
        ->name('developer-software.create-software-template');
    Route::post('/developer-software-store-software-template/{id}',
        [\App\Http\Controllers\DeveloperSoftwareController::class, 'storeSoftwareTemplate'])
        ->name('developer-software.store-software-template');
    Route::get('/developer-software-edit-software-template/{id}',
        [\App\Http\Controllers\DeveloperSoftwareController::class, 'editSoftwareTemplate'])
        ->name('developer-software.edit-software-template');
    Route::put('/developer-software-update-software-template/{id}',
        [\App\Http\Controllers\DeveloperSoftwareController::class, 'updateSoftwareTemplate'])
        ->name('developer-software.update-software-template');
    Route::delete('/developer-software-delete-software-template/{id}',
        [\App\Http\Controllers\DeveloperSoftwareController::class, 'destroySoftwareTemplate'])
        ->name('developer-software.destroy-software-template');



//License Attribute
    Route::get('/developer-license-create-attribute/{id}',
        [\App\Http\Controllers\DeveloperLicenseController::class, 'createAttribute'])
        ->name('developer-license.create-attribute');
    Route::post('/developer-license-store-attribute/{id}',
        [\App\Http\Controllers\DeveloperLicenseController::class, 'storeAttribute'])
        ->name('developer-license.store-attribute');
    Route::put('/developer-license.update-attribute/{id}',
        [\App\Http\Controllers\DeveloperLicenseController::class, 'updateAttribute'])
        ->name('developer-license.update-attribute');
    Route::delete('/developer-license-delete-attribute/{id}',
        [\App\Http\Controllers\DeveloperLicenseController::class, 'destroyAttribute'])
        ->name('developer-license.destroy-attribute');
    Route::get('/developer-license-edit-attribute/{id}',
        [\App\Http\Controllers\DeveloperLicenseController::class, 'editAttribute'])
        ->name('developer-license.edit-attribute');



//Remote Access
    Route::get('/developer-license-view-license/{id}',
        [\App\Http\Controllers\DeveloperLicenseController::class, 'viewLicense'])
        ->name('developer-licence.view-license');
    Route::get('/developer-license.edit-remote-access/{id}',
        [\App\Http\Controllers\DeveloperLicenseController::class, 'editRemoteAccess'])
        ->name('developer-license.edit-remote-access');
    Route::delete('/developer-license.delete-remote-access/{id}',
        [\App\Http\Controllers\DeveloperLicenseController::class, 'destroyRemoteAccess'])
        ->name('developer-license.destroy-remote-access');
    Route::put('/developer-license.update-remote-access/{id}',
        [\App\Http\Controllers\DeveloperLicenseController::class, 'updateRemoteAccess'])
        ->name('developer-license.update-remote-access');
    Route::post('/developer-license.store-remote-access/{id}',
        [\App\Http\Controllers\DeveloperLicenseController::class, 'storeRemoteAccess'])
        ->name('developer-license.store-remote-access');




    Route::resource('/developer-ticket', \App\Http\Controllers\DeveloperTicketController::class);
    Route::resource('/developer-client', \App\Http\Controllers\DeveloperClientController::class);
    Route::resource('/developer-software', \App\Http\Controllers\DeveloperSoftwareController::class);


    Route::resource('/developer-role', \App\Http\Controllers\DeveloperRoleController::class);
    Route::resource('/developer-permission', \App\Http\Controllers\DeveloperPermissionController::class);
    Route::resource('/developer-license', \App\Http\Controllers\DeveloperLicenseController::class);
    Route::resource('/developer-category', \App\Http\Controllers\DeveloperCategoryController::class);
    Route::resource('/developer-status', \App\Http\Controllers\DeveloperStatusController::class);
    Route::resource('/developer-user', \App\Http\Controllers\DeveloperUserController::class);
    Route::resource('/developer', \App\Http\Controllers\DeveloperController::class);

});

Route::group(['middleware' => ['role:Licenser']], function () {

//License Attribute
    Route::get('/licenser-license-create-attribute/{id}',
        [\App\Http\Controllers\LicenserLicenseController::class, 'createAttribute'])
        ->name('licenser-license.create-attribute');
    Route::post('/licenser-license-store-attribute/{id}',
        [\App\Http\Controllers\LicenserLicenseController::class, 'storeAttribute'])
        ->name('licenser-license.store-attribute');
    Route::put('/licenser-license.update-attribute/{id}',
        [\App\Http\Controllers\LicenserLicenseController::class, 'updateAttribute'])
        ->name('licenser-license.update-attribute');
    Route::delete('/licenser-license-delete-attribute/{id}',
        [\App\Http\Controllers\LicenserLicenseController::class, 'destroyAttribute'])
        ->name('licenser-license.destroy-attribute');
    Route::get('/licenser-license-edit-attribute/{id}',
        [\App\Http\Controllers\LicenserLicenseController::class, 'editAttribute'])
        ->name('licenser-license.edit-attribute');



//Remote Access
    Route::get('/licenser-license-view-license/{id}',
        [\App\Http\Controllers\LicenserLicenseController::class, 'viewLicense'])
        ->name('licenser-licence.view-license');
    Route::get('/licenser-license.edit-remote-access/{id}',
        [\App\Http\Controllers\LicenserLicenseController::class, 'editRemoteAccess'])
        ->name('licenser-license.edit-remote-access');
    Route::delete('/licenser-license.delete-remote-access/{id}',
        [\App\Http\Controllers\LicenserLicenseController::class, 'destroyRemoteAccess'])
        ->name('licenser-license.destroy-remote-access');
    Route::put('/licenser-license.update-remote-access/{id}',
        [\App\Http\Controllers\LicenserLicenseController::class, 'updateRemoteAccess'])
        ->name('licenser-license.update-remote-access');
    Route::post('/licenser-license.store-remote-access/{id}',
        [\App\Http\Controllers\LicenserLicenseController::class, 'storeRemoteAccess'])
        ->name('licenser-license.store-remote-access');


    Route::resource('/licenser-license', \App\Http\Controllers\LicenserLicenseController::class);
    Route::resource('/licenser', \App\Http\Controllers\LicenserController::class);

});

Route::group(['middleware' => ['role:Support']], function (){
    Route::resource('/support-ticket', \App\Http\Controllers\SupportTicketController::class);
    Route::resource('/support', \App\Http\Controllers\SupportController::class);
});

Route::group(['middleware' => ['role:Super Admin']], function (){

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
    Route::resource('/super-admin-report', \App\Http\Controllers\SuperAdminReportController::class);
    Route::resource('/super-admin', \App\Http\Controllers\SuperAdminController::class);


});




Route::post('/profile-update-password', [\App\Http\Controllers\ProfileController::class, 'updatePassword'])
    ->name('profile.update-password');
Route::resource('/profile', \App\Http\Controllers\ProfileController::class);
Auth::routes();



//Route::get('/home', function (){
//
//})->name('home');


