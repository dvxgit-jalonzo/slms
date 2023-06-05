<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                    <li class="breadcrumb-item"><a href="{{route('super-admin-ticket.create')}}">Create Ticket</a></li>
                    <li class="breadcrumb-item"><a href="{{route('super-admin-report.create')}}">File a Report</a></li>
                    <li class="breadcrumb-item"><a href="{{route('super-admin-license.create')}}">Generate License</a></li>
                </ol>
            </nav>
        </div>
    @endsection



    @section('content')
        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">


                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Softwares </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-card-list"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{$numberOfSoftwares}}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Users </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-badge"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{$numberOfUsers}}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-12">

                            <div class="card info-card customers-card">

                                <div class="card-body">
                                    <h5 class="card-title">Clients </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{$numberOfClient}}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Top Selling -->
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Top 3 Software</h5>

                                    <table class="table table-borderless">
                                        <thead>
                                        <tr>
                                            <th scope="col">Code</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-success fw-semibold">GE12</td>
                                            <td>HRIS</td>
                                            <td>Human Resource Information System</td>
                                        </tr>
                                        <tr>
                                            <td class="text-success fw-semibold">XF53</td>
                                            <td>SLMS</td>
                                            <td>Software Licenser Management System</td>
                                        </tr>
                                        <tr>
                                            <td class="text-success fw-semibold">Q4G5</td>
                                            <td>EyeCan</td>
                                            <td>A System for Visual Impaired Person</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Top Selling -->

                    </div>
                </div><!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">

                    <!-- Recent Clients -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Recent Added Clients </h5>

                            <div class="activity">

                                @forelse($recentClients as $recentClient)
                                    <div class="activity-item d-flex">
                                        <div class="activite-label">{{$recentClient->created_at->shortRelativeDiffForHumans()}}</div>
                                        <i class='bi bi-circle-fill activity-badge {{Arr::random(['text-success', 'text-danger', 'text-info', 'text-warning', 'text-dark'])}} align-self-start'></i>
                                        <div class="activity-content">
                                            <b>{{$recentClient->code}}</b> {{$recentClient->company_name}} <br> {{$recentClient->description}}
                                        </div>
                                    </div><!-- End activity item-->
                                @empty
                                    <p class="text-center p-3 rounded fw-semibold" style="background-color: rgba(206,206,206,0.4)">No client found.</p>
                                @endforelse

                            </div>

                        </div>
                    </div>
                    <!-- End Recent Clients -->

                    <!-- Recent Software Updates -->
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Recent License Update</h5>

                            <div class="activity">

                                @forelse($recentLicenses as $recentLicense)
                                    <div class="activity-item d-flex">
                                        <div class="activite-label">{{$recentLicense->created_at->shortRelativeDiffForHumans()}}</div>
                                        <i class='bi bi-circle-fill activity-badge {{Arr::random(['text-success', 'text-danger', 'text-info', 'text-warning', 'text-dark'])}} align-self-start'></i>
                                        <div class="activity-content">
                                            <b>{{$recentLicense->client->company_name}}</b> <br>{{$recentLicense->dat_file}}
                                        </div>
                                    </div><!-- End activity item-->
                                @empty
                                    <p class="text-center p-3 rounded fw-semibold" style="background-color: rgba(206,206,206,0.4)">No license update found.</p>
                                @endforelse

                            </div>

                        </div>
                    </div>
                    <!-- End Recent Updates -->

                    <!-- Recent Reports -->
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Recent Ticket and Report</h5>

                            <div class="activity">

                                @forelse($recentTicketAndReports as $item)

                                    <div class="activity-item d-flex">
                                        <div class="activite-label">{{$item->created_at->shortRelativeDiffForHumans()}}</div>
                                        <i class='bi bi-circle-fill activity-badge {{Arr::random(['text-success', 'text-danger', 'text-info', 'text-warning', 'text-dark'])}} align-self-start'></i>
                                        <div class="activity-content">
                                        @if($item instanceof \App\Models\Ticket)
                                            <b> {{$item->title}}</b> <br> {{$item->assignedToUser->name}} <br> <strong class="text-secondary text-uppercase small">Ticket </strong> | <strong class="text-info text-uppercase small">{{$item->priority}}</strong>
                                            @elseif($item instanceof \App\Models\Report)
                                            <b> {{$item->title}}</b> <br> <strong class="text-danger text-uppercase small">Report </strong> | <strong class="text-info text-uppercase small">{{$item->priority}}</strong>  | <strong class="text-primary text-uppercase small">{{$item->status}}</strong>
                                        @endif
                                        </div>
                                    </div>




                                @empty
                                    <p class="text-center p-3 rounded fw-semibold" style="background-color: rgba(206,206,206,0.4)">No ticket or report found.</p>
                                @endforelse
                            </div>

                        </div>
                    </div>
                    <!-- End Recent Reports -->



                </div>
                <!-- End Right side columns -->

            </div>
        </section>
    @endsection
</x-master>
