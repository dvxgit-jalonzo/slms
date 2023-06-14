<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class SuperAdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $title = 'Delete Role!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('super-admin.role.index', compact('roles'));
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
            'name' => 'required|unique:roles',
        ]);


        Role::create([
            'name' => $request->name
        ]);


        Alert::alert('Success', 'Created Successfully!', 'success')
            ->autoClose(3000);


        return redirect()->route('super-admin-role.index');
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
        $role = Role::findOrFail($id);

        return view('super-admin.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);

        $role = Role::findOrFail($id);

        $role->update([
            'name' => $request->name
        ]);

        Alert::alert('Updated', 'Updated Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('super-admin-role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);

        if ($role->users()->count() > 0) {
            Alert::alert('Error', 'Cannot delete role. Users are assigned to this role.', 'error')
                ->autoClose(3000);

            return redirect()->route('super-admin-role.index');
        }

        // No users assigned to the role, safe to delete
        $role->delete();

        Alert::alert('Deleted', 'Deleted Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('super-admin-role.index');
    }
}
