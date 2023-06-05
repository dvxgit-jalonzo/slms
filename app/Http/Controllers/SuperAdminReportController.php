<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SuperAdminReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::with('author')->get();

        $title = 'Delete Report!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('super-admin.report.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $statuses = Status::all();
        return view('super-admin.report.create', compact('categories','statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'status_id' => 'required',
            'priority' => 'required',
        ]);


        $status = Status::find($request->status_id);


        Report::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
            'status_id' => $status->id,
            'priority' => $request->priority,
        ]);

        Alert::alert('Success', 'Created Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('super-admin-report.index');
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
        $report = Report::find($id);
        $statuses = Status::all();

        return view('super-admin.report.edit', compact('statuses', 'report'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $report = Report::find($id);
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'status_id' => 'required',
            'priority' => 'required',
        ]);


        $status = Status::find($request->status_id);


        $report->update([
            'title' => $request->title,
            'description' => $request->description,
            'status_id' => $status->id,
            'priority' => $request->priority,
        ]);

        Alert::alert('Success', 'Updated Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('super-admin-report.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $report = Report::find($id);
        if ($report->delete()){
            Alert::alert('Success', 'Deleted Successfully!', 'success')
                ->autoClose(3000);
        }

        return redirect()->route('super-admin-report.index');
    }
}
