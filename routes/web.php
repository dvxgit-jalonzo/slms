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
        return redirect()->route('master.index');
    }else{
        return view('auth.login');
    }
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/master-client-edit-contact-person/{id}',
        [\App\Http\Controllers\MasterClientController::class, 'editContactPerson'])
        ->name('master-client.edit-contact-person');
    Route::delete('/master-client-delete-contact-person/{id}',
        [\App\Http\Controllers\MasterClientController::class, 'destroyContactPerson'])
        ->name('master-client.destroy-contact-person');
    Route::put('/master-client-update-contact-person/{id}',
        [\App\Http\Controllers\MasterClientController::class, 'updateContactPerson'])
        ->name('master-client.update-contact-person');
    Route::post('/master-client-store-contact-person/{id}',
        [\App\Http\Controllers\MasterClientController::class, 'storeContactPerson'])
        ->name('master-client.store-contact-person');


//Software Module
    Route::get('/master-software-create-software-module/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'createSoftwareModule'])
        ->name('master-software.create-software-module');
    Route::post('/master-software-store-software-module/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'storeSoftwareModule'])
        ->name('master-software.store-software-module');
    Route::get('/master-software-edit-software-module/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'editSoftwareModule'])
        ->name('master-software.edit-software-module');
    Route::put('/master-software-update-software-module/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'updateSoftwareModule'])
        ->name('master-software.update-software-module');
    Route::delete('/master-software-delete-software-module/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'destroySoftwareModule'])
        ->name('master-software.destroy-software-module');



//Software Requirements
    Route::get('/master-software-edit-software-requirement/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'editSoftwareRequirement'])
        ->name('master-software.edit-software-requirement');
    Route::delete('/master-software-delete-software-requirement/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'destroySoftwareRequirement'])
        ->name('master-software.destroy-software-requirement');
    Route::put('/master-software-update-software-requirement/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'updateSoftwareRequirement'])
        ->name('master-software.update-software-requirement');
    Route::post('/master-software-store-software-requirement/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'storeSoftwareRequirement'])
        ->name('master-software.store-software-requirement');



//Software Template
    Route::get('/master-software-create-software-template/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'createSoftwareTemplate'])
        ->name('master-software.create-software-template');
    Route::post('/master-software-store-software-template/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'storeSoftwareTemplate'])
        ->name('master-software.store-software-template');
    Route::get('/master-software-edit-software-template/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'editSoftwareTemplate'])
        ->name('master-software.edit-software-template');
    Route::put('/master-software-update-software-template/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'updateSoftwareTemplate'])
        ->name('master-software.update-software-template');
    Route::delete('/master-software-delete-software-template/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'destroySoftwareTemplate'])
        ->name('master-software.destroy-software-template');



    Route::get('/master-software-create-software-template/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'createSoftwareTemplate'])
        ->name('master-software.create-software-template');
    Route::post('/master-software-store-software-template/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'storeSoftwareTemplate'])
        ->name('master-software.store-software-template');
    Route::get('/master-software-edit-software-template/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'editSoftwareTemplate'])
        ->name('master-software.edit-software-template');
    Route::put('/master-software-update-software-template/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'updateSoftwareTemplate'])
        ->name('master-software.update-software-template');
    Route::delete('/master-software-delete-software-template/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'destroySoftwareTemplate'])
        ->name('master-software.destroy-software-template');


    Route::get('/master-software-create-software-device/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'createSoftwareDevice'])
        ->name('master-software.create-software-device');
    Route::post('/master-software-store-software-device/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'storeSoftwareDevice'])
        ->name('master-software.store-software-device');
    Route::get('/master-software-edit-software-device/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'editSoftwareDevice'])
        ->name('master-software.edit-software-device');
    Route::put('/master-software-update-software-device/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'updateSoftwareDevice'])
        ->name('master-software.update-software-device');
    Route::delete('/master-software-delete-software-device/{id}',
        [\App\Http\Controllers\MasterSoftwareController::class, 'destroySoftwareDevice'])
        ->name('master-software.destroy-software-device');



    Route::get('/master-license-create-attribute/{id}',
        [\App\Http\Controllers\MasterLicenseController::class, 'createAttribute'])
        ->name('master-license.create-attribute');
    Route::post('/master-license-store-attribute/{id}',
        [\App\Http\Controllers\MasterLicenseController::class, 'storeAttribute'])
        ->name('master-license.store-attribute');
    Route::put('/master-license.update-attribute/{id}',
        [\App\Http\Controllers\MasterLicenseController::class, 'updateAttribute'])
        ->name('master-license.update-attribute');
    Route::delete('/master-license-delete-attribute/{id}',
        [\App\Http\Controllers\MasterLicenseController::class, 'destroyAttribute'])
        ->name('master-license.destroy-attribute');
    Route::get('/master-license-edit-attribute/{id}',
        [\App\Http\Controllers\MasterLicenseController::class, 'editAttribute'])
        ->name('master-license.edit-attribute');


    Route::get('/master-license-view-license/{id}',
        [\App\Http\Controllers\MasterLicenseController::class, 'viewLicense'])
        ->name('master-licence.view-license');
    Route::get('/master-license.edit-remote-access/{id}',
        [\App\Http\Controllers\MasterLicenseController::class, 'editRemoteAccess'])
        ->name('master-license.edit-remote-access');
    Route::delete('/master-license.delete-remote-access/{id}',
        [\App\Http\Controllers\MasterLicenseController::class, 'destroyRemoteAccess'])
        ->name('master-license.destroy-remote-access');
    Route::put('/master-license.update-remote-access/{id}',
        [\App\Http\Controllers\MasterLicenseController::class, 'updateRemoteAccess'])
        ->name('master-license.update-remote-access');
    Route::post('/master-license.store-remote-access/{id}',
        [\App\Http\Controllers\MasterLicenseController::class, 'storeRemoteAccess'])
        ->name('master-license.store-remote-access');


    Route::get('master-ticket-download/{id}',
        [\App\Http\Controllers\MasterTicketController::class, 'download'])
        ->name('master-ticket.download');



    Route::get('/master-client-edit-contact-person/{id}',
        [\App\Http\Controllers\MasterClientController::class, 'editContactPerson'])
        ->name('master-client.edit-contact-person');
    Route::delete('/master-client-delete-contact-person/{id}',
        [\App\Http\Controllers\MasterClientController::class, 'destroyContactPerson'])
        ->name('master-client.destroy-contact-person');
    Route::put('/master-client-update-contact-person/{id}',
        [\App\Http\Controllers\MasterClientController::class, 'updateContactPerson'])
        ->name('master-client.update-contact-person');
    Route::post('/master-client-store-contact-person/{id}',
        [\App\Http\Controllers\MasterClientController::class, 'storeContactPerson'])
        ->name('master-client.store-contact-person');



    Route::put('/master-role-updatePermission/{id}',
        [\App\Http\Controllers\MasterRoleController::class, 'updatePermission'])
        ->name('master-role.updatePermission');

    Route::get('/master-ticket-review/{id}',
        [\App\Http\Controllers\MasterTicketController::class, 'setReview']
    )->name('master-ticket.review');



    Route::resource('/master-category', \App\Http\Controllers\MasterCategoryController::class);
    Route::resource('/master-client', \App\Http\Controllers\MasterClientController::class);
    Route::resource('/master-license', \App\Http\Controllers\MasterLicenseController::class);
    Route::resource('/master-report', \App\Http\Controllers\MasterReportController::class);
    Route::resource('/master-software', \App\Http\Controllers\MasterSoftwareController::class);
    Route::resource('/master-status', \App\Http\Controllers\MasterStatusController::class);
    Route::resource('/master-ticket', \App\Http\Controllers\MasterTicketController::class);
    Route::resource('/master-permission', \App\Http\Controllers\MasterPermissionController::class);
    Route::resource('/master-software-under', \App\Http\Controllers\MasterSoftwareUnderController::class);
    Route::resource('/master-ticket-template', \App\Http\Controllers\MasterTicketTemplateController::class);
    Route::resource('/master-user', \App\Http\Controllers\MasterUserController::class);
    Route::resource('/master-role', \App\Http\Controllers\MasterRoleController::class);
    Route::resource('/master', \App\Http\Controllers\MasterController::class);

    Route::post('/profile-update-password', [\App\Http\Controllers\ProfileController::class, 'updatePassword'])
        ->name('profile.update-password');
    Route::resource('/profile', \App\Http\Controllers\ProfileController::class);
});


Auth::routes();


