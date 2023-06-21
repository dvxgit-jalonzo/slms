<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MasterUserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        $this->validate($request, [
            'picture' => 'required'
        ]);
        $profile = UserProfile::where('user_id', $id);
        $picture = $request->picture;
        $hashProfile = $picture->hashName();

        if ($profile->exists()){
            if (file_exists(storage_path('app/public/profile/'.$profile->first()->picture))){
                unlink(storage_path('app/public/profile/'.$profile->first()->picture));
            }

            $profile->update([
                'picture' => $hashProfile
            ]);




            $picture->move(storage_path('app/public/profile'), $hashProfile);


            Alert::alert('Success', 'Updated Successfully!', 'success')
                ->autoClose(3000);


            return redirect()->route('profile.index');
        }else{
            UserProfile::create([
                'user_id' => $id,
                'picture' => $hashProfile
            ]);


            if ($picture->move(storage_path('app/public/profile'), $hashProfile)){
                Alert::alert('Success', 'Uploaded Successfully!', 'success')
                    ->autoClose(3000);


                return redirect()->route('profile.index');
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
