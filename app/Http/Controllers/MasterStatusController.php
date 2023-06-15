<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MasterStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::user()->hasPermissionTo('manage-status')) {
                abort(403, 'Unauthorized action.');
            }

            return $next($request);
        });
    }

    public function index()
    {
        $statuses = Status::all();
        $title = 'Delete Status!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('master.status.index', compact('statuses'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.status.create');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:statuses'
        ]);


        Status::create([
            'name' => $request->name
        ]);

        Alert::alert('Success', 'Created Successfully!', 'success')
            ->autoClose(3000);


        return redirect()->route('master-status.index');
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
        $status = Status::findOrFail($id);
        return view('master.status.edit', compact('status'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $status = Status::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|unique:statuses,name,'.$id
        ]);

        $status->update([
            'name' => $request->name
        ]);

        Alert::alert('Success', 'Created Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('master-status.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = Status::findOrFail($id);
        $isHave = Ticket::where('status_id', $status->id)->exists();

        if ($isHave){
            Alert::alert('Cant Delete', 'This Status is already assigned to another Ticket record.', 'error')
                ->autoClose(3000);
        }else{
            $status->delete();
            Alert::alert('Deleted', 'Deleted Successfully.', 'success')
                ->autoClose(3000);
        }

        return redirect()->route('master-status.index');
    }
}
