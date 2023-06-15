<?php

namespace App\Http\Controllers;

use App\Models\TicketTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MasterTicketTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::user()->hasPermissionTo('manage-ticket')) {
                abort(403, 'Unauthorized action.');
            }

            return $next($request);
        });
    }


    public function index()
    {
        $ticket_templates = TicketTemplate::all();
        return view('master.ticket-template.index', compact('ticket_templates'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.ticket-template.create');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'cont' => 'required'
        ]);

        TicketTemplate::create([
            'cont' => $request->cont,
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

        return view('master.ticket-template.edit', compact('ticket_template'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ticket_template = TicketTemplate::findOrFail($id);
        $this->validate($request, [
            'cont' => 'required'
        ]);

        $ticket_template->update([
            'cont' => $request->cont,
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
