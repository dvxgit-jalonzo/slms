<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SuperAdminTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        $title = 'Delete Ticket!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('super-admin.ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $statuses = Status::all();
        $users = User::all();
        return view('super-admin.ticket.create', compact('categories','statuses', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'status_id' => 'required',
            'assigned_to' => 'required',
            'priority' => 'required',
        ]);



        $category = Category::find($request->category_id);
        $status = Status::find($request->status_id);
        $assigned_to = User::find($request->assigned_to);

        Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
            'assigned_to' => $assigned_to->id,
            'priority' => $request->priority,
        ]);

        Alert::alert('Success', 'Created Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('super-admin-ticket.index');
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
        $ticket = Ticket::find($id);
        $categories = Category::all();
        $statuses = Status::all();
        $users = User::all();
        return view('super-admin.ticket.edit', compact('ticket', 'categories', 'statuses', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ticket = Ticket::find($id);
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'status_id' => 'required',
            'assigned_to' => 'required',
            'priority' => 'required',
        ]);

        $category = Category::find($request->category_id);
        $status = Status::find($request->status_id);
        $assigned_to = User::find($request->assigned_to);

        $ticket->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $category->id,
            'status_id' => $status->id,
            'assigned_to' => $assigned_to->id,
            'priority' => $request->priority,
        ]);

        Alert::alert('Success', 'Updated Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('super-admin-ticket.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $ticket = Ticket::find($id);
        if ($ticket->delete()){
            Alert::alert('Success', 'Deleted Successfully!', 'success')
                ->autoClose(3000);

        }

        return redirect()->route('super-admin-ticket.index');
    }
}
