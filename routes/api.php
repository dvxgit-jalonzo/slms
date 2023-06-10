<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('super-admin-software-get-template/{id}',
    [\App\Http\Controllers\SuperAdminSoftwareController::class, 'apiGetSoftwareTemplate'])
    ->name('super-admin-software.get-template');

Route::get('super-admin-check-exist',
    [\App\Http\Controllers\SuperAdminSoftwareController::class, 'checkExist'])
    ->name('super-admin-check-exist.license');


Route::post('super-admin-decrypt-content',
    [\App\Http\Controllers\SuperAdminLicenseController::class, 'decryptFile'])
    ->name('super-admin-decrypt.content');





Route::get('administrator-software-get-template/{id}',
    [\App\Http\Controllers\AdministratorSoftwareController::class, 'apiGetSoftwareTemplate'])
    ->name('administrator-software.get-template');

Route::get('administrator-check-exist',
    [\App\Http\Controllers\AdministratorSoftwareController::class, 'checkExist'])
    ->name('administrator-check-exist.license');


Route::post('administrator-decrypt-content',
    [\App\Http\Controllers\AdministratorLicenseController::class, 'decryptFile'])
    ->name('administrator-decrypt.content');





Route::get('developer-software-get-template/{id}',
    [\App\Http\Controllers\DeveloperSoftwareController::class, 'apiGetSoftwareTemplate'])
    ->name('developer-software.get-template');

Route::get('developer-check-exist',
    [\App\Http\Controllers\DeveloperSoftwareController::class, 'checkExist'])
    ->name('developer-check-exist.license');


Route::post('developer-decrypt-content',
    [\App\Http\Controllers\DeveloperLicenseController::class, 'decryptFile'])
    ->name('developer-decrypt.content');





Route::get('licenser-software-get-template/{id}',
    [\App\Http\Controllers\LicenserSoftwareController::class, 'apiGetSoftwareTemplate'])
    ->name('licenser-software.get-template');

Route::get('licenser-check-exist',
    [\App\Http\Controllers\LicenserSoftwareController::class, 'checkExist'])
    ->name('licenser-check-exist.license');


Route::post('licenser-decrypt-content',
    [\App\Http\Controllers\LicenserLicenseController::class, 'decryptFile'])
    ->name('licenser-decrypt.content');

