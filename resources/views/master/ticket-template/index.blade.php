<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Ticket Template</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('master-ticket-template.create')}}">Create Ticket</a></li>
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
                                <td>Template</td>
                                <td>CreatedAt</td>
{{--                                <td>Edit</td>--}}
{{--                                <td>Delete</td>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ticket_templates as $ticket_template)
                                <tr>

                                    <td>
                                        <a href="{{route('master-ticket-template.edit', [$ticket_template->id])}}">Click to view</a>
                                    </td>
                                    <td>{{$ticket_template->created_at}}</td>
{{--                                    <td>--}}
{{--                                        <a href="{{route('master-ticket.edit', [$ticket->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>--}}
{{--                                    <td>--}}
{{--                                        <a href="{{ route('master-ticket.destroy', [$ticket->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>--}}
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
