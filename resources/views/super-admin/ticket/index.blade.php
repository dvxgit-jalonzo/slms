<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Clients</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('super-admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('super-admin-client.create')}}">Create Client</a></li>
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
                                <td>Code</td>
                                <td>Company</td>
                                <td>Description</td>
                                <td>Location</td>
                                <td>CreatedAt</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td>{{$client->code}}</td>
                                    <td>{{$client->company_name}}</td>
                                    <td>{{$client->description}}</td>
                                    <td>{{$client->location}}</td>
                                    <td>{{$client->created_at}}</td>
                                    <td>
                                        <a href="{{route('super-admin-client.edit', [$client->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                    <td><a href="{{ route('super-admin-client.destroy', [$client->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
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
