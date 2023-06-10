<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (\auth()->check()){
            $user = Auth::user()->get();
            return view('profile.index', compact('user'));
        }

        Alert::alert('Not Authenticated.', 'Sorry you must login first before proceeding.', 'error')
            ->autoClose(3000);
        return redirect()->route('login');


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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail(\auth()->user()->id);

        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users,username,'.$id,
            'email' => 'required|unique:users,email,'.$id,
        ]);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->username,
        ]);

        Alert::alert("Update", "Your profile updated successfully.", "success");

        return redirect()->route('profile.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updatePassword(Request $request){
        $this->validate($request, [
            'current_password' => 'required',
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            ],
        ], [
            'password.regex' => 'The password format is invalid. It must have at least 1 lowercase letter, 1 uppercase letter, 1 number, and 1 special character.',
        ]);

        if (Auth::attempt([
            'email' => \auth()->user()->email,
            'password' => $request->current_password
        ])) {
            Auth::user()->update([
                'password' => bcrypt($request->password)
            ]);
            Alert::alert("Update", "Your password updated successfully.", "success");
        }else{
            Alert::alert("Password Incorrect", "Your given current password incorrect.", "error");
        }
        return redirect()->route('profile.index');



    }
}
