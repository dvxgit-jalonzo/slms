<?php

namespace App\Http\Controllers;

use App\Diavox\DiavoxLicenser;
use App\Models\Client;
use App\Models\License;
use App\Models\LicenseAttribute;
use App\Models\LicenseRemoteAccess;
use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DeveloperLicenseController extends Controller
{
    public function index(){
        $licenses = License::all();


        $title = 'Delete License!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('developer.license.index', compact('licenses'));
    }


    public function create(){
        do {
            $serial = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            $existingSerial = License::where('serial_number', $serial)->exists();
        } while ($existingSerial);
        $clients = Client::all();
        $softwares = Software::where('with_licensing', 1)->get();
        return view('developer.license.create', compact('serial', 'clients', 'softwares'));
    }

    public function store(Request $request){
        $diav = new DiavoxLicenser();

        $data = [];
        for ($x = 0; $x<count($request->name); $x++){
            $data[$request->name[$x]] = $request->value[$x];
        }


        $license = License::where('client_id', $request->client_id)->where('software_id', $request->software_id);
        if ($license->exists()){

            $license_data = $license->first();
            $serial = $data['_SERIAL'];
            $content = json_encode($data);


            $content =$diav->encrypt($content);
            $filename = $license_data->dat_file;
            $filepath = storage_path('app/public/dat_files/'.$filename);
            if (!file_exists(storage_path('app/public/dat_files'))){
                mkdir(storage_path('app/public/dat_files'), 0777, true);
            }


            $license_data->update([
                'installation_date' => $request->installation_date,
                'expiration_date' => $request->expiration_date,
                'sma_expiration' => $request->sma_expiration,
                'serial_number' => $serial
            ]);
            if (file_put_contents($filepath, $content)){
                Alert::alert('Updated', 'Updated Successfully!', 'success')
                    ->autoClose(3000);
            }

        }else{
            $content = json_encode($data);
            $content =$diav->encrypt($content);
            $filename = "sysconfig_".time().".json";
            $filepath = storage_path('app/public/dat_files/'.$filename);
            if (!file_exists(storage_path('app/public/dat_files'))){
                mkdir(storage_path('app/public/dat_files'), 0777, true);
            }

            License::create([
                'client_id' => $request->client_id,
                'software_id' => $request->software_id,
                'dat_file' => $filename,
                'installation_date' => $request->installation_date,
                'expiration_date' => $request->expiration_date,
                'sma_expiration' => $request->sma_expiration,
                'serial_number' => $request->serial_number,
            ]);


            if (file_put_contents($filepath, $content)){
                Alert::alert('Success', 'Created Successfully!', 'success')
                    ->autoClose(3000);
            }
        }




//        $data["_DATETODAY"] = today('Asia/Manila')->format('Y-m-d');
//        $data['_SERIAL'] = $request->serial_number;
//        $data['_INITVAL'] = 0;
//        $data['_LICTYPE'] = 0;

//        $data = [
//            '_INITVAL' => 0,
//            '_LICTYPE' => 0,
//            '_SERIAL' => $request->serial_number,
//            '_COMPANY' => $company->company_name,
//            '_EMAIL' => $company->email,
//            '_DATEINSTALL' => "2023-02-20",
//            '_DATETODAY' => today('Asia/Manila')->format('Y-m-d'),
//            '_DATEEXPIRE' => "4023-02-31",
//            '_SMAEXPIRE' => "4023-02-31",
//            '_EXPDAYS' => "4023-02-31",
//            '_PORTS' => "8983",
//            '_MAILBOXES' => "1000",
//            '_LANGUAGES' => "2",
//            '_UUID' => getUniquePCId(),
//            '_VOICEMAIL' => 1,
//            '_HOSPITALITY' => 0,
//            '_CRUISE' => 0,
//        ];




        return redirect()->route('developer-license.index');
    }

    public function show(string $id){
        $license = License::findOrFail($id);
        return view('developer.license.show', compact('license'));
    }

    public function destroy(string $id){
        $license = License::findOrFail($id);
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
        return redirect()->route('developer-license.index');
    }


    public function viewLicense(string $id){


        $license = License::findOrFail($id);
        $sysconf = $license->dat_file;

        $jsonFilePath = storage_path('app/public/dat_files/').$sysconf;
        $jsonContent = file_get_contents($jsonFilePath);
        $dvx = new DiavoxLicenser();
        $json = $dvx->decrypt($jsonContent);
        return view('developer.license.view-license', compact('json', 'license'));
    }


    public function editRemoteAccess(string $id){
        $remote = LicenseRemoteAccess::findOrFail($id);
        return view('developer.license.edit-remote-access', compact('remote'));
    }

    public function updateRemoteAccess(Request $request, string $id){
        $this->validate($request, [
            'application' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $remote = LicenseRemoteAccess::findOrFail($id);

        $remote->update([
            'application' => $request->application,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        Alert::alert('Updated', 'Remote Access Updated Successfully!', 'success')
            ->autoClose(3000);
        return redirect()->route('developer-license.index');

    }

    public function storeRemoteAccess(Request $request, string $id){
        $this->validate($request, [
            'application' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        LicenseRemoteAccess::create([
            'license_id' => $id,
            'application' => $request->application,
            'username' => $request->username,
            'password' => $request->password,

        ]);


        Alert::alert('Success', 'Remote Access Created Successfully!', 'success')
            ->autoClose(3000);
        return redirect()->route('developer-license.index');
    }

    public function destroyRemoteAccess(string $id){
        $remote = LicenseRemoteAccess::findOrFail($id);
        if ($remote->delete()){
            Alert::alert('Deleted', 'Remote Access Deleted Successfully!', 'success')
                ->autoClose(3000);
        }

        return redirect()->route('developer-license.index');
    }


    public function createAttribute(string $id){
        $license = License::findOrFail($id);
        return view('developer.license.create-license-attribute', compact('license'));
    }

    public function storeAttribute(Request $request, string $id){

        $this->validate($request, [
            'key' => 'required',
            'value' => 'required',
        ]);

        LicenseAttribute::create([
            'license_id' => $id,
            'key' => $request->key,
            'value' => $request->value,
        ]);


        Alert::alert('Success', 'Attribute Created Successfully!', 'success')
            ->autoClose(3000);
        return redirect()->route('developer-license.index');
    }

    public function editAttribute($id){
        $attribute = LicenseAttribute::findOrFail($id);
        return view('developer.license.edit-license-attribute', compact('attribute'));
    }

    public function updateAttribute(Request $request, string $id){
        $this->validate($request, [
            'key' => 'required',
            'value' => 'required',
        ]);

        $attribute = LicenseAttribute::findOrFail($id);

        $attribute->update([
            'key' => $request->key,
            'value' => $request->value,
        ]);
        Alert::alert('Updated', 'Attribute Updated Successfully!', 'success')
            ->autoClose(3000);


        return redirect()->route('developer-license.index');


    }

    public function destroyAttribute(string $id){
        $attribute = LicenseAttribute::findOrFail($id);
        if ($attribute->delete()){
            Alert::alert('Deleted', 'Attribute Deleted Successfully!', 'success')
                ->autoClose(3000);
        }
        return redirect()->route('developer-license.index');
    }


//    API
    public function decryptFile(Request $request){
        $encrypted = $request->fileContent;
        $diav = new DiavoxLicenser();
        $decrypt = $diav->decrypt($encrypted);
        return json_encode($decrypt);
    }
}
