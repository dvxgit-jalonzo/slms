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
