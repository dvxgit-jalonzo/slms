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
//    [\App\Http\Controllers\MasterSoftwareController::class, 'apiGetSoftwareTemplate']
    function (string $id){
        return SoftwareTemplate::where('software_id', $id)->get();
    }
)->name('master-software.get-template');

Route::get('master-check-exist',
//    [\App\Http\Controllers\MasterSoftwareController::class, 'checkExist']

    function (Request $request){
        $license = License::where('client_id', $request->client_id)->where('software_id', $request->software_id);

        if ($license->exists()){
            return $license->get();
        }
    }
)->name('master-check-exist.license');


Route::post('master-decrypt-content',
//    [\App\Http\Controllers\MasterLicenseController::class, 'decryptFile']
    function (Request $request){
        $encrypted = $request->fileContent;
        $diav = new DiavoxLicenser();
        $decrypt = $diav->decrypt($encrypted);
        return json_encode($decrypt);
    }
)->name('master-decrypt.content');


Route::get("master-software-get-code",
//    [\App\Http\Controllers\MasterSoftwareController::class, 'getSoftwareCode']
    function (Request $request){
        return Software::select("code")->where('id', $request->software_id)->get();
    }
)->name('master-software.get-software-code');




Route::get("master-client-get-code",
//    [\App\Http\Controllers\MasterClientController::class, 'getClientCode']
    function (Request $request){
        return Client::select("code")->where('id', $request->client_id)->get();
    }
)->name('master-client.get-client-code');


//This should be ticket .. to edit
Route::get("master-license-get-last-id",
//    [\App\Http\Controllers\MasterLicenseController::class, 'getLastID']
    function (){
        $license = Ticket::orderBy('id', 'desc')->limit(1)->first();

        if (empty($license)){
            return "000001";
        }

        return strrev(str_pad($license->id+1, 6, "0"));
    }
)->name('master-license.get-last-id');
