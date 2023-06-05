<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientContact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SuperAdminClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('super-admin.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('super-admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'company_name' => 'required|unique:clients',
            'description' => 'required',
            'email' => 'required|unique:clients',
            'location' => 'required',
        ]);


        Client::create([
            'code' => $request->code,
            'company_name' => $request->company_name,
            'description' => $request->description,
            'email' => $request->email,
            'location' => $request->location,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        Alert::alert('Success', 'Created Successfully!', 'success')
            ->autoClose(3000);


        return redirect()->route('super-admin-client.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::find($id);
        return view('super-admin.client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $client = Client::find($id);
        return view('super-admin.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::find($id);
        $this->validate($request, [
            'code' => 'required',
            'company_name' => 'required|unique:clients,company_name,'.$id,
            'description' => 'required',
            'email' => 'required|unique:clients,email,'.$id,
            'location' => 'required',
        ]);



        $client->update([
            'code' => $request->code,
            'company_name' => $request->company_name,
            'description' => $request->description,
            'email' => $request->email,
            'location' => $request->location,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        Alert::alert('Success', 'Updated Successfully!', 'success')
            ->autoClose(3000);



        return redirect()->route('super-admin-client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);

        if ($client->clientContacts()->exists()) {
            $client->clientContacts()->delete();
        }
        if ($client->delete()){
            Alert::alert('Success', 'Deleted Successfully!', 'success')
                ->autoClose(3000);

            return redirect()->route('super-admin-client.index');
        }
    }

    public function editContactPerson(string $id)
    {
        $contact = ClientContact::find($id);

        return view('super-admin.client.edit-contact-person', compact('contact'));
    }




    public function destroyContactPerson(string $id)
    {
        $contact = ClientContact::find($id);
        $message = "ClientContact Person from ".$contact->client->company_name." has been Deleted Successfully!";

        if ($contact->delete()){
            Alert::alert('Success', $message, 'success')
                ->autoClose(3000);

            return redirect()->route('super-admin-client.index');
        }
    }

    public function storeContactPerson(Request $request, string $id){
        $this->validate($request, [
            'contact_person' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
        ]);

        ClientContact::create([
            'client_id' => $id,
            'contact_person' => $request->contact_person,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
        ]);

        $client = Client::find($id);
        $message = "ClientContact Added to Client ".$client->company_name;
        Alert::alert('Success', $message, 'success')
            ->autoClose(3000);

        return redirect()->route('super-admin-client.index');

    }


    public function updateContactPerson(Request $request, string $id){

        $this->validate($request, [
            'contact_person' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
        ]);

        $contact = ClientContact::find($id);



        $contact->update([
            'client_id' => $contact->client->id,
            'contact_person' => $request->contact_person,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
        ]);


        $message = "ClientContact Person of Client ".$contact->client->company_name." Updated Successfully!";
        Alert::alert('Success', $message, 'success')
            ->autoClose(3000);

        return redirect()->route('super-admin-client.index');

    }
}
