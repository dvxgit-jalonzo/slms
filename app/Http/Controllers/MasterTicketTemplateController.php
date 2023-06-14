<?php

namespace App\Http\Controllers;

use App\Models\TicketTemplate;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MasterTicketTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticket_templates = TicketTemplate::all();

        $role = getRole();

        if ($role == "Super Admin"){
            return view('super-admin.ticket-template.index', compact('ticket_templates'));
        }else if ($role == "Administrator"){
            return view('administrator.ticket-template.index', compact('ticket_templates'));
        }else if ($role == "Developer"){
            return view('developer.ticket-template.index', compact('ticket_templates'));
        }else if ($role == "Licenser"){
            return view('licenser.ticket-template.index', compact('ticket_templates'));
        }else if ($role == "Support"){
            return view('support.ticket-template.index', compact('ticket_templates'));
        }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $role = getRole();

        if ($role == "Super Admin"){
            return view('super-admin.ticket-template.create');
        }else if ($role == "Administrator"){
            return view('administrator.ticket-template.create');
        }else if ($role == "Developer"){
            return view('developer.ticket-template.create');
        }else if ($role == "Licenser"){
            return view('licenser.ticket-template.create');
        }else if ($role == "Support"){
            return view('support.ticket-template.create');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required'
        ]);

        TicketTemplate::create([
            'content' => $request->content,
        ]);

        Alert::alert('Success', 'Created Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('master-ticket-template.index');
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
        $ticket_template = TicketTemplate::findOrFail($id);


        $role = getRole();

        if ($role == "Super Admin"){
            return view('super-admin.ticket-template.edit', compact('ticket_template'));
        }else if ($role == "Administrator"){
            return view('administrator.ticket-template.edit', compact('ticket_template'));
        }else if ($role == "Developer"){
            return view('developer.ticket-template.edit', compact('ticket_template'));
        }else if ($role == "Licenser"){
            return view('licenser.ticket-template.edit', compact('ticket_template'));
        }else if ($role == "Support"){
            return view('support.ticket-template.edit', compact('ticket_template'));
        }


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ticket_template = TicketTemplate::findOrFail($id);
        $this->validate($request, [
            'content' => 'required'
        ]);

        $ticket_template->update([
            'content' => $request->content,
        ]);

        Alert::alert('Updated', 'Updated Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('master-ticket-template.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}