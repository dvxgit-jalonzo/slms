<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class MasterUserController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::user()->hasPermissionTo('manage-user')) {
                abort(403, 'Unauthorized action.');
            }

            return $next($request);
        });
    }


    public function index()
    {
        $users = User::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if (getRole() != "Super Admin"){
            $users = User::whereDoesntHave('roles', function ($query) {
                $query->where('name', 'Super Admin');
            })->get();
        }

        return view('master.user.index', compact('users'));



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::query();

        if (getRole() != "Super Admin"){
            $roles = $roles->whereNot('name', "Super Admin");
        }
        $roles = $roles->get();
        return view('master.user.create', compact('roles'));



    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required',
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            ],
            'role' => 'required',
        ], [
            'password.regex' => 'The password format is invalid. It must have at least 1 lowercase letter, 1 uppercase letter, 1 number, and 1 special character.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        $role = Role::findByName($request->role);

        $user->assignRole($role);

        if ($user->assignRole($role)){
            Alert::alert('Success', 'Created Successfully!', 'success')
                ->autoClose(3000);
        }



        return redirect()->route('master-user.index');
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
        $user = User::findOrFail($id);
        $roles = Role::all();


        if (getRole() != "Super Admin"){
            if ($user->getRoleNames()->first() == "Super Admin"){
                Alert::alert("Failed", "You are not authorized to modify this user.", "error")->autoClose(5000);
                return redirect()->route('master-user.index');
            }
        }

        return view('master.user.edit', compact('user', 'roles'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'username' => 'required',
            'role' => 'required',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username
        ]);

        $role = Role::findByName($request->role);

        if ( $user->syncRoles($role)){
            Alert::alert('Success', 'Updated Successfully!', 'success')
                ->autoClose(3000);
        }



        return redirect()->route('master-user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        if ($user->delete()){
            Alert::alert('Success', 'Deleted Successfully!', 'success')
                ->autoClose(3000);

            return redirect()->route('master-user.index');
        }
    }
}
