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
        if ($role == 'Super Admin'){
            \RealRashid\SweetAlert\Facades\Alert::info("Welcome", "You are logged in!");
            return redirect()->route('super-admin.index');
        }
    }else{
        return view('auth.login');
    }
});

Route::group(['middleware' => ['role:Super Admin']], function (){
    Route::resource('/super-admin-ticket', \App\Http\Controllers\SuperAdminTicketController::class);
    Route::get('/mce', function (){
       return view('super-admin.ticket.tinymce');
    });

    Route::get('/super-admin-client-edit-contact-person/{id}', [\App\Http\Controllers\SuperAdminClientController::class, 'editContactPerson'])
        ->name('super-admin-client.edit-contact-person');

    Route::delete('/super-admin-client-delete-contact-person/{id}', [\App\Http\Controllers\SuperAdminClientController::class, 'destroyContactPerson'])
        ->name('super-admin-client.destroy-contact-person');

    Route::put('/super-admin-client-update-contact-person/{id}', [\App\Http\Controllers\SuperAdminClientController::class, 'updateContactPerson'])
        ->name('super-admin-client.update-contact-person');

    Route::post('/super-admin-client-store-contact-person/{id}', [\App\Http\Controllers\SuperAdminClientController::class, 'storeContactPerson'])
        ->name('super-admin-client.store-contact-person');

    Route::resource('/super-admin-client', \App\Http\Controllers\SuperAdminClientController::class);




    Route::get('/super-admin-software-edit-software-requirement/{id}', [\App\Http\Controllers\SuperAdminSoftwareController::class, 'editSoftwareRequirement'])
        ->name('super-admin-software.edit-software-requirement');

    Route::delete('/super-admin-software-delete-software-requirement/{id}', [\App\Http\Controllers\SuperAdminSoftwareController::class, 'destroySoftwareRequirement'])
        ->name('super-admin-software.destroy-software-requirement');

    Route::put('/super-admin-software-update-software-requirement/{id}', [\App\Http\Controllers\SuperAdminSoftwareController::class, 'updateSoftwareRequirement'])
        ->name('super-admin-software.update-software-requirement');

    Route::post('/super-admin-software-store-software-requirement/{id}', [\App\Http\Controllers\SuperAdminSoftwareController::class, 'storeSoftwareRequirement'])
        ->name('super-admin-software.store-software-requirement');

    Route::resource('/super-admin-software', \App\Http\Controllers\SuperAdminSoftwareController::class);



    Route::resource('/super-admin-user', \App\Http\Controllers\SuperAdminUserController::class);
    Route::resource('/super-admin', \App\Http\Controllers\SuperAdminController::class);



    Route::get('/super-admin-software-make', [\App\Http\Controllers\SuperAdminLicenseController::class, 'make']);
});

Auth::routes();

//Route::get('/home', function (){
//
//})->name('home');


