<?php

namespace App\Http\Controllers;

use App\Models\License;
use App\Models\Software;
use App\Models\SoftwareRequirement;
use App\Models\SoftwareTemplate;
use App\Models\SoftwareUnder;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SuperAdminSoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $software = Software::all();
        $title = 'Delete Software!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('super-admin.software.index', compact('software'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('super-admin.software.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);

        $inputs = [
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'template' => $request->template,
            'with_licensing' => false,
        ];

        if (isset($request->with_licensing)){
            $inputs['with_licensing'] = true;
        }


        if (Software::create($inputs)){
            Alert::alert('Success', 'Created Successfully!', 'success')
                ->autoClose(3000);

        }


        return redirect()->route('super-admin-software.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $software = Software::findOrFail($id);
        return view('super-admin.software.show', compact('software'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $software = Software::findOrFail($id);

        return view('super-admin.software.edit', compact('software'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $software = Software::findOrFail($id);
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);

        $inputs = [
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'with_licensing' => false,
        ];

        if (isset($request->with_licensing)){
            $inputs['with_licensing'] = true;
        }

        $software->update($inputs);

        Alert::alert('Success', 'Updated Successfully!', 'success')
            ->autoClose(3000);


        return redirect()->route('super-admin-software.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $software = Software::findOrFail($id);
        if ($software->software_requirements()->exists()){
            $software->software_requirements->delete();
        }


        if ($software->delete()){
            Alert::alert('Success', 'Deleted Successfully!', 'success')
                ->autoClose(3000);
        }

        return redirect()->route('super-admin-software.index');
    }

    public function storeSoftwareRequirement(Request $request, string $id){

        $this->validate($request, [
            'name' => 'required',
            'specs' => 'required'
        ]);


        SoftwareRequirement::create([
            'software_id' => $id,
            'name' => $request->name,
            'specs' => $request->specs
        ]);



        Alert::alert('Success', 'Created Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('super-admin-software.index');
    }

    public function editSoftwareRequirement( string $id){
        $software_requirement = SoftwareRequirement::findOrFail($id);
        return view('super-admin.software.edit-software-requirement', compact('software_requirement'));
    }

    public function updateSoftwareRequirement(Request $request, string $id){
        $software_requirement = SoftwareRequirement::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'specs' => 'required'
        ]);

        $software_requirement->update([
            'name' => $request->name,
            'specs' => $request->specs,
        ]);

        Alert::alert('Success', 'Updated Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('super-admin-software.index');
    }

    public function destroySoftwareRequirement($id){
        $software_requirement = SoftwareRequirement::findOrFail($id);

        if ($software_requirement->delete()){
            Alert::alert('Success', 'Deleted Successfully!', 'success')
                ->autoClose(3000);
        }
        return redirect()->route('super-admin-software.index');
    }


    public function createSoftwareModule(string $id){
        $software = Software::findOrFail($id);

        return view('super-admin.software.create-software-module', compact('software'));
    }

    public function storeSoftwareModule(Request $request, string $id){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        SoftwareUnder::create([
            'software_id' => $id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        Alert::alert('Success', 'Created Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('super-admin-software.index');
    }

    public function updateSoftwareModule(Request $request, string $id){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $module = SoftwareUnder::findOrFail($id);

        $module->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        Alert::alert('Success', 'Updated Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('super-admin-software.index');
    }

    public function editSoftwareModule(Request $request, string $id){
        $module = SoftwareUnder::findOrFail($id);

        return view('super-admin.software.edit-software-module', compact('module'));
    }

    public function destroySoftwareModule(string $id){
        $module = SoftwareUnder::findOrFail($id);

        if ($module->delete()){

            Alert::alert('Deleted', 'Deleted Successfully!', 'success')
                ->autoClose(3000);
        }

        return redirect()->route('super-admin-software.index');
    }


    public function  createSoftwareTemplate(string $id){
        $software = Software::findOrFail($id);
        return view('super-admin.software.create-software-template', compact('software'));
    }

    public function editSoftwareTemplate(string $id){
        $template = SoftwareTemplate::findOrFail($id);
        return view('super-admin.software.edit-software-template', compact('template'));
    }


    public function storeSoftwareTemplate(Request $request, string $id){
        $this->validate($request, [
            'name.*' => 'required',
            'label.*' => 'required',
        ]);




        for($x=0; $x<count($request->name); $x++){
            SoftwareTemplate::create([
                'software_id' => $id,
                'label' => ucwords($request->label[$x]),
                'name' => strtoupper("_".$request->name[$x]),
                'value' => $request->value[$x],
            ]);
        }




        Alert::alert('Success', 'Created Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('super-admin-software.index');
    }

    public function updateSoftwareTemplate(Request $request, string $id){
        $this->validate($request, [
            'name' => 'required',
            'label' => 'required',
        ]);

        $template = SoftwareTemplate::findOrFail($id);
        $template->update([
            'label' => ucwords($request->label),
            'name' => $request->name,
            'value' => $request->value,
        ]);
        Alert::alert('Updated', 'Updated Successfully!', 'success')
            ->autoClose(3000);
        return redirect()->route('super-admin-software.index');
    }

    public function destroySoftwareTemplate(string $id){
        $template = SoftwareTemplate::findOrFail($id);
        if ($template->delete()){
            Alert::alert('Delete', 'Deleted Successfully!', 'success')
                ->autoClose(3000);
        }
        return redirect()->route('super-admin-software.index');
    }

















//    API
    public function apiGetSoftwareTemplate(string $id){
        return SoftwareTemplate::where('software_id', $id)->get();

    }

    public function checkExist(Request $request){

       $license = License::where('client_id', $request->client_id)->where('software_id', $request->software_id);

       if ($license->exists()){
           return $license->get();
       }
    }
}
