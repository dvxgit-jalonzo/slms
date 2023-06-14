<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Software;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\TicketTemplate;
use App\Models\User;
use Dompdf\Dompdf;
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
        $clients = Client::all();
        $softwares = Software::all();
        $ticket_template = TicketTemplate::select("content")->first()->content;

        return view('super-admin.ticket.create', compact('categories','statuses', 'users', 'clients', 'softwares', 'ticket_template'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'client_id' => 'required',
            'software_id' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'status_id' => 'required',
            'assigned_to' => 'required',
            'priority' => 'required',
        ]);



        $category = Category::findOrFail($request->category_id);
        $status = Status::findOrFail($request->status_id);
        $assigned_to = User::findOrFail($request->assigned_to);

        Ticket::create([
            'title' => $request->title,
            'client_id' => $request->client_id,
            'software_id' => $request->software_id,
            'ticket_number' => $request->ticket_number,
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
    public function download(string $id){
        $ticket = Ticket::findOrFail($id);

        $fileName = 'Ticket_' . $ticket->ticket_number . '.pdf';

        $dompdf = new Dompdf();
        $dompdf->loadHtml($ticket->description);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        return $dompdf->stream($fileName);
    }

    public function edit(string $id)
    {
        $ticket = Ticket::findOrFail($id);

//        $fileName = 'template_' . $ticket->id . '.pdf';
//
//        $dompdf = new Dompdf();
//        $dompdf->loadHtml($ticket->description);
//
//        $dompdf->setPaper('A4', 'portrait');
//
//        $dompdf->render();
//
//        return $dompdf->stream($fileName);



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
        $ticket = Ticket::findOrFail($id);
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'status_id' => 'required',
            'assigned_to' => 'required',
            'priority' => 'required',
        ]);

        $category = Category::findOrFail($request->category_id);
        $status = Status::findOrFail($request->status_id);
        $assigned_to = User::findOrFail($request->assigned_to);

        $ticket->update([
            'title' => $request->title,
            'description' => $request->description,
//            'ticket_number' => $request->ticket_number,
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

        $ticket = Ticket::findOrFail($id);
        if ($ticket->delete()){
            Alert::alert('Success', 'Deleted Successfully!', 'success')
                ->autoClose(3000);

        }

        return redirect()->route('super-admin-ticket.index');
    }
}


