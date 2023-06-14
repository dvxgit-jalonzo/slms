<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class MasterPermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        $title = 'Delete Permission!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $role = getRole();

        if ($role == "Super Admin"){
            return view('super-admin.permission.index', compact('permissions'));
        }else if ($role == "Administrator"){
            return view('administrator.permission.index', compact('permissions'));
        }else if ($role == "Developer"){
            return view('developer.permission.index', compact('permissions'));
        }else if ($role == "Licenser"){
            return view('licenser.permission.index', compact('permissions'));
        }else if ($role == "Support"){
            return view('support.permission.index', compact('permissions'));
        }


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


        return redirect()->route('master-permission.index');
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


        $role = getRole();

        if ($role == "Super Admin"){
            return view('super-admin.permission.edit', compact('permission'));
        }else if ($role == "Administrator"){
            return view('administrator.permission.edit', compact('permission'));
        }else if ($role == "Developer"){
            return view('developer.permission.edit', compact('permission'));
        }else if ($role == "Licenser"){
            return view('licenser.permission.edit', compact('permission'));
        }else if ($role == "Support"){
            return view('support.permission.edit', compact('permission'));
        }


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

        return redirect()->route('master-permission.index');
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

        return redirect()->route('master-permission.index');
    }
}
