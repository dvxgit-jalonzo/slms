<?php

namespace App\Http\Controllers;

use App\Diavox\DiavoxLicenser;
use App\Models\Client;
use App\Models\License;
use App\Models\Software;
use App\Models\SoftwareTemplate;
use App\Models\Ticket;
use Illuminate\Http\Request;

class MasterApiController extends Controller
{
    public function apiGetSoftwareTemplate(string $id){
        return SoftwareTemplate::where('software_id', $id)->get();
    }



    public function checkExist(Request $request){
        $license = License::where('client_id', $request->client_id)->where('software_id', $request->software_id);

        if ($license->exists()){
            return $license->get();
        }
    }


    public function decryptFile(Request $request){
        $encrypted = $request->fileContent;
        $diav = new DiavoxLicenser();
        $decrypt = $diav->decrypt($encrypted);
        return json_encode($decrypt);
    }

    public function getSoftwareCode(Request $request){
        return Software::select("code")->where('id', $request->software_id)->get();
    }


    public function getClientCode(Request $request){
        return Client::select("code")->where('id', $request->client_id)->get();
    }


    public function getLastID(){
        $license = Ticket::orderBy('id', 'desc')->limit(1)->first();

        if (empty($license)){
            return "000001";
        }

        return strrev(str_pad($license->id+1, 6, "0"));
    }


    public function getLicenseSerial(Request $request){
        $client_id = $request->client_id;
        $software_id = $request->software_id;
        $license = License::where('client_id', $client_id)
            ->where('software_id', $software_id)
            ->first();

        return $license->serial_number;
    }
}
