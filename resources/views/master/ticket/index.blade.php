<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Tickets</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('master-ticket.create')}}">Create Ticket</a></li>
                </ol>
            </nav>
        </div>
    @endsection



    @section('content')
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card card-body pt-3 table-responsive" >



                        <table class="table table-sm" id="table">
                            <thead>
                            <tr>
                                <td>Title</td>
                                <td>Client</td>
                                <td>Software</td>
                                <td>Category</td>
                                <td>Status</td>
                                <td>ReviewedBy</td>
                                <td>Priority</td>
                                <td>CreatedAt</td>
                                <td>PDF</td>
                                <td>Review</td>
                                <td>Edit</td>
                                <td>Delete</td>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td>{{$ticket->title}}</td>
                                    <td>{{$ticket->client->company_name}}</td>
                                    <td>{{$ticket->software->name}}</td>
                                    <td>{{$ticket->category->name}}</td>
                                    <td>{{$ticket->status->name}}</td>
                                    <td>
                                        <div class="badge bg-secondary-light">
                                           @if(!empty($ticket->is_reviewed))
                                                <span style="size: 1px; color: darkblue">{{$ticket->reviewedBy->name}}</span>
                                            @else
                                                <span style="size: 1px; color: darkblue">not yet</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{$ticket->priority}}</td>
                                    <td>{{$ticket->created_at}}</td>
                                    <td><a href="{{route('master-ticket.download', [$ticket->id])}}" class="btn btn-sm btn-outline-dark"><i class="bi bi-download"></i></a></td></td>
                                    <td><a  class="btn btn-outline-danger {{$ticket->is_reviewed ? "disabled" : ""}} btn-sm"  onclick="event.preventDefault(); reviewConfirm({{ $ticket->id }});">Review</a></td>
                                    <td><a href="{{route('master-ticket.edit', [$ticket->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                    <td><a href="{{ route('master-ticket.destroy', [$ticket->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endsection


    @section('script')
            <script>


                function reviewConfirm(ticketId){
                    Swal.fire({
                        title: 'Review Ticket!',
                        text: 'Are you sure you want to set this as reviewed?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, set as reviewed'
                    }).then((result) => {
                        if(result.isConfirmed){
                            window.location.href = "{{ route('master-ticket.review', ':id') }}".replace(':id', ticketId);
                        }
                    });
                }

                $(document).ready(function(){
                    $("#table").DataTable({
                        dom: "Bfrtip",
                        buttons: [
                            {
                                extend: "pdfHtml5",
                                filename: "Tickets-{{now()}}",
                                title: 'Tickets as of {{now()->format('F d,Y')}}',
                                exportOptions: {
                                    columns: [0,1,2,3,4,5,6,7] // Specify the index of the specific column to be exported (zero-based)
                                }
                            },
                            {
                                extend: "print",
                                filename: "Tickets-{{now()}}",
                                title: 'Tickets as of {{now()->format('F d, Y')}}',
                                exportOptions: {
                                    columns: [0,1,2,3,4,5,6,7] // Specify the index of the specific column to be exported (zero-based)
                                }
                            },
                            {
                                extend: "excel",
                                filename: "Tickets-{{now()}}",
                                title: 'Tickets as of {{now()->format('F d, Y')}}',
                                exportOptions: {
                                    columns: [0,1,2,3,4,5,6,7] // Specify the index of the specific column to be exported (zero-based)
                                }
                            },
                            {
                                text: 'Outlook',
                                action: function () {
                                    window.open("https://mail.diavox.net/interface/root#/email", "_blank");
                                }
                            }
                        ]
                    });
                });
            </script>

    @endsection
</x-master>
