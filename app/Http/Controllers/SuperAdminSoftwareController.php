<?php

namespace App\Http\Controllers;

use App\Models\Software;
use App\Models\SoftwareRequirement;
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
            'with_licensing' => false,
        ];

        if (isset($request->with_licensing)){
            $inputs['with_licensing'] = true;
        }

        Software::create($inputs);

        Alert::alert('Success', 'Created Successfully!', 'success')
            ->autoClose(3000);


        return redirect()->route('super-admin-software.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $software = Software::find($id);
        return view('super-admin.software.show', compact('software'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $software = Software::find($id);

        return view('super-admin.software.edit', compact('software'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $software = Software::find($id);
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
        $software = Software::find($id);
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
        $software_requirement = SoftwareRequirement::find($id);
        return view('super-admin.software.edit-software-requirement', compact('software_requirement'));
    }

    public function updateSoftwareRequirement(Request $request, string $id){
        $software_requirement = SoftwareRequirement::find($id);
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
        $software_requirement = SoftwareRequirement::find($id);

        if ($software_requirement->delete()){
            Alert::alert('Success', 'Deleted Successfully!', 'success')
                ->autoClose(3000);
        }
        return redirect()->route('super-admin-software.index');
    }
}
