<?php

use App\Diavox\DiavoxLicenser;
use App\Models\Client;
use App\Models\License;
use App\Models\Software;
use App\Models\SoftwareTemplate;
use App\Models\Ticket;
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








Route::get('master-software-get-template/{id}',
    [\App\Http\Controllers\MasterApiController::class, 'apiGetSoftwareTemplate']

)->name('master-software.get-template');

Route::get('master-check-exist',
    [\App\Http\Controllers\MasterApiController::class, 'checkExist']
)->name('master-check-exist.license');


Route::post('master-decrypt-content',
    [\App\Http\Controllers\MasterApiController::class, 'decryptFile']
)->name('master-decrypt.content');


Route::get("master-software-get-code",
    [\App\Http\Controllers\MasterApiController::class, 'getSoftwareCode']
)->name('master-software.get-software-code');

Route::get("master-license-get-serial",
    [\App\Http\Controllers\MasterApiController::class, 'getLicenseSerial']
)->name('master-license.get-license-serial');



Route::get("master-client-get-code",
    [\App\Http\Controllers\MasterApiController::class, 'getClientCode']
)->name('master-client.get-client-code');


//This should be ticket .. to edit
Route::get("master-license-get-last-id",
    [\App\Http\Controllers\MasterApiController::class, 'getLastID']
)->name('master-license.get-last-id');
