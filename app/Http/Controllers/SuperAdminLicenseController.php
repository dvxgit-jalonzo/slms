<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DiavoxLicenser;

class SuperAdminLicenseController extends Controller
{
    public function make(Request $request)
    {
        $key = '0123456789abcdef0123456789abcdef';

        DiavoxLicenser::setEncryptionKey($key);
        $encryptedValue = DiavoxLicenser::encrypt($key);


        $decryptedValue = DiavoxLicenser::decrypt($encryptedValue);

        dd($encryptedValue, $decryptedValue);
    }
}
