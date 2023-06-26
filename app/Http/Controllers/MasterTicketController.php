<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Software;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\TicketTemplate;
use App\Models\User;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class MasterTicketController extends Controller
{
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


        $tickets = Ticket::all();

        $title = 'Delete Ticket!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('master.ticket.index', compact('tickets'));


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
        $ticket_template = TicketTemplate::select("cont")->first()->cont;
//        $datePlaceholder = '{date_today}';
//        $currentDate = Carbon::now()->format('Y-m-d');
//        $ticket_template = str_replace($datePlaceholder, $currentDate, $ticket_template);

        return view('master.ticket.create', compact('categories','statuses', 'users', 'clients', 'softwares', 'ticket_template'));



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

        return redirect()->route('master-ticket.index');
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


        $categories = Category::all();
        $statuses = Status::all();
        $users = User::all();
        $clients = Client::all();
        $softwares = Software::all();

        return view('master.ticket.edit', compact('ticket', 'categories', 'statuses', 'users', 'clients', 'softwares'));



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ticket = Ticket::findOrFail($id);
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

        $ticket->update([
            'title' => $request->title,
            'client_id' => $request->client_id,
            'software_id' => $request->software_id,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
            'category_id' => $category->id,
            'status_id' => $status->id,    
            'priority' => $request->priority,
        ]);

        Alert::alert('Updated', 'Updated Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('master-ticket.index');
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

        return redirect()->route('master-ticket.index');
    }

    public function setReview(string $id){

        $ticket = Ticket::find($id);

        $ticket->update([
            'is_reviewed' => 1,
            'reviewed_by' => auth()->user()->id
        ]);

        Alert::alert('Reviewed', 'Ticket Reviewed Successfully!', 'success')
            ->autoClose(3000);
        return redirect()->route('master-ticket.index');
    }
}
