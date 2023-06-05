<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\License;
use App\Models\Software;
use Illuminate\Http\Request;
use App\DiavoxLicenser;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SuperAdminLicenseController extends Controller
{

    public function index(){
        $licenses = License::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('super-admin.license.index', compact('licenses'));
    }


    public function create(){
        do {
            $serial = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            $existingSerial = License::where('serial_number', $serial)->exists();
        } while ($existingSerial);
        $clients = Client::all();
        $softwares = Software::where('with_licensing', 1)->get();
        return view('super-admin.license.create', compact('serial', 'clients', 'softwares'));
    }

    public function store(Request $request){
        $software = Software::find($request->software_id);
        $company = Client::find($request->client_id);

        $data = [
            '_INITVAL' => 1,
            '_LICTYPE' => 1,
            '_SERIAL' => $software->code,
            '_COMPANY' => $company->company_name,
            '_EMAIL' => $company->email,
            '_DATEINSTALL' => "2023-02-20",
            '_DATETODAY' => today('Asia/Manila')->format('Y-m-d'),
            '_DATEEXPIRE' => "4023-02-31",
            '_SMAEXPIRE' => "4023-02-31",
            '_EXPIREDAYS' => "4023-02-31",
            '_PORTS' => "8983",
            '_MAILBOXES' => "1000",
            '_LANGUAGE' => "2",
            '_UUID' => getUniquePCId(),
            '_VOICE_MAIL' => true,
            '_HOSPITALITY' => false,
            '_CRUISE' => false,
        ];


        $content = json_encode($data);


        $filename = "sysconfig_".time().".json";
        $filepath = storage_path('app/public/dat_files/'.$filename);
        if (!file_exists(storage_path('app/public/dat_files'))){
            mkdir(storage_path('app/public/dat_files'), 0777, true);
        }

        License::create([
            'client_id' => $request->client_id,
            'dat_file' => $filename,
            'serial_number' => $request->serial_number,
        ]);

        if (file_put_contents($filepath, $content)){
            Alert::alert('Success', 'Created Successfully!', 'success')
                ->autoClose(3000);
        }


        return redirect()->route('super-admin-license.index');
    }

    public function destroy(string $id){
        $license = License::find($id);
        $file = $license->dat_file;
        $filePath = 'dat_files/' . $file;

        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            Alert::alert('Deleted', 'File Deleted Successfully!', 'success')
                ->autoClose(3000);
        } else {
            Alert::alert('Not Found', 'The file is not found.', 'info')
                ->autoClose(3000);
        }
        $license->delete();
        return redirect()->route('super-admin-license.index');
    }

    public function make(Request $request)
    {
        $key = '0123456789abcdef0123456789abcdef';

        DiavoxLicenser::setEncryptionKey($key);
        $encryptedValue = DiavoxLicenser::encrypt($key);


        $decryptedValue = DiavoxLicenser::decrypt($encryptedValue);

        dd($encryptedValue, $decryptedValue);
    }
}
