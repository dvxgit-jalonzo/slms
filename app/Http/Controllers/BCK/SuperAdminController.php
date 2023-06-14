<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\License;
use App\Models\Report;
use App\Models\Software;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $numberOfClient = Client::count();
        $numberOfUsers = User::count();
        $numberOfSoftwares = Software::count();
        $recentClients = Client::limit(3)
            ->latest()
        ->get();

        $recentLicenses = License::limit(3)
            ->latest()
            ->get();

        $status = Status::where("name", "resolved")->first();


        $recentTickets = Ticket::whereNot('status_id', "=", $status->id)->get();

        $recentReports = Report::limit(3)
            ->latest()
            ->get();

        $softwares = Software::paginate(5);


        return  view('super-admin.index', compact([
                'numberOfClient',
                'numberOfUsers',
                'numberOfSoftwares',
                'recentClients',
                'recentLicenses',
                'recentTickets',
                'softwares'
            ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
