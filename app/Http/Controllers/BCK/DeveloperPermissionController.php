<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class DeveloperPermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        $title = 'Delete Permission!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('developer.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions',
        ]);


        Permission::create([
            'name' => $request->name
        ]);


        Alert::alert('Success', 'Created Successfully!', 'success')
            ->autoClose(3000);


        return redirect()->route('developer-permission.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = Permission::findOrFail($id);

        return view('developer.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);

        $permission = Permission::findOrFail($id);

        $permission->update([
            'name' => $request->name
        ]);

        Alert::alert('Updated', 'Updated Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('developer-permission.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::findOrFail($id);


        // No users assigned to the permission, safe to delete
        $permission->delete();

        Alert::alert('Deleted', 'Deleted Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('developer-permission.index');
    }
}
