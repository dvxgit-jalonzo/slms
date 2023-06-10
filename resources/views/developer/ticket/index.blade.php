<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Tickets</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('developer.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('developer-ticket.create')}}">Create Ticket</a></li>
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
                                <td>Description</td>
                                <td>Assigner</td>
                                <td>AssignedTo</td>
                                <td>Category</td>
                                <td>Status</td>
                                <td>Priority</td>
                                <td>CreatedAt</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td>{{$ticket->title}}</td>
                                    <td>{!! $ticket->description !!}</td>
                                    <td>{{$ticket->generateBy->name}}</td>
                                    <td>{{$ticket->assignedToUser->name}}</td>
                                    <td>{{$ticket->category->name}}</td>
                                    <td>{{$ticket->status->name}}</td>
                                    <td>{{$ticket->priority}}</td>
                                    <td>{{$ticket->created_at}}</td>
                                    <td>
                                        <a href="{{route('developer-ticket.edit', [$ticket->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                    <td><a href="{{ route('developer-ticket.destroy', [$ticket->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
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
                $(document).ready(function(){
                    $("#table").DataTable();
                });
            </script>

    @endsection
</x-master>
