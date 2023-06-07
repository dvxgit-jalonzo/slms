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
use Spatie\Permission\Models\Role;

class SuperAdminLicenseController extends Controller
{

    public function index(){
        $licenses = License::all();


        $title = 'Delete License!';
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
        $diav = new DiavoxLicenser();
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
            '_VOICE_MAIL' => 1,
            '_HOSPITALITY' => 0,
            '_CRUISE' => 0,
        ];


        $content = json_encode($data);
        $content =$diav->encrypt($content);

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

    public function show(string $id){
        $license = License::find($id);
        return view('super-admin.license.show', compact('license'));
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


    public function viewLicense(string $id){


        $license = License::find($id);
        $sysconf = $license->dat_file;

        $jsonFilePath = storage_path('app/public/dat_files/').$sysconf;
        $jsonContent = file_get_contents($jsonFilePath);
        $dvx = new DiavoxLicenser();
        $json = $dvx->decrypt($jsonContent);
        return view('super-admin.license.view-license', compact('json', 'license'));
    }


    public function editRemoteAccess(string $id){
        $remote = LicenseRemoteAccess::find($id);
        return view('super-admin.license.edit-remote-access', compact('remote'));
    }

    public function updateRemoteAccess(Request $request, string $id){
        $this->validate($request, [
            'application' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $remote = LicenseRemoteAccess::find($id);

        $remote->update([
            'application' => $request->application,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        Alert::alert('Updated', 'Remote Access Updated Successfully!', 'success')
            ->autoClose(3000);
        return redirect()->route('super-admin-license.index');

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
        return redirect()->route('super-admin-license.index');
    }

    public function destroyRemoteAccess(string $id){
        $remote = LicenseRemoteAccess::find($id);
        if ($remote->delete()){
            Alert::alert('Deleted', 'Remote Access Deleted Successfully!', 'success')
                ->autoClose(3000);
        }

        return redirect()->route('super-admin-license.index');
    }


    public function createAttribute(string $id){
        $license = License::find($id);
        return view('super-admin.license.create-license-attribute', compact('license'));
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
        return redirect()->route('super-admin-license.index');
    }

    public function editAttribute($id){
        $attribute = LicenseAttribute::find($id);
        return view('super-admin.license.edit-license-attribute', compact('attribute'));
    }

    public function updateAttribute(Request $request, string $id){
        $this->validate($request, [
            'key' => 'required',
            'value' => 'required',
        ]);

        $attribute = LicenseAttribute::find($id);

        $attribute->update([
            'key' => $request->key,
            'value' => $request->value,
        ]);
        Alert::alert('Updated', 'Attribute Updated Successfully!', 'success')
            ->autoClose(3000);


        return redirect()->route('super-admin-license.index');


    }

    public function destroyAttribute(string $id){
        $attribute = LicenseAttribute::find($id);
        if ($attribute->delete()){
            Alert::alert('Deleted', 'Attribute Deleted Successfully!', 'success')
                ->autoClose(3000);
        }
        return redirect()->route('super-admin-license.index');
    }



}
