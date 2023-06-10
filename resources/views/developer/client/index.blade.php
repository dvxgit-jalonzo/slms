<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Clients</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('developer.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('developer-client.create')}}">Create Client</a></li>
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
                                <td>Email</td>
                                <td>Location</td>
                                <td>CreatedAt</td>
                                <td>Contacts</td>
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
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->location}}</td>
                                    <td>{{$client->created_at}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#tableContact{{$client->id}}">Contacts</button>
                                        <div class="modal fade " id="tableContact{{$client->id}}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Contacts
                                                        </h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <a href="{{route('developer-client.show', [$client->id])}}" class="btn btn-sm btn-outline-primary mb-3"><i class="bi bi-person-add"></i>  Contact Person</a>
                                                        <div class="table-responsive">
                                                            <table class="table table-sm contacts-table" >
                                                                <thead>
                                                                <tr>
                                                                    <th>Person</th>
                                                                    <th>Email</th>
                                                                    <th>ContactNumber</th>
                                                                    <th>Edit</th>
                                                                    <th>Delete</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($client->clientContacts as $contact)
                                                                    <tr>
                                                                        <td>{{$contact->contact_person}}</td>
                                                                        <td>{{$contact->email}}</td>
                                                                        <td>{{$contact->contact_number}}</td>
                                                                        <td><a href="{{route('developer-client.edit-contact-person', [$contact->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                                                        <td><a href="{{ route('developer-client.destroy-contact-person', [$contact->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>

                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="{{route('developer-client.edit', [$client->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                    <td><a href="{{ route('developer-client.destroy', [$client->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
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



                    // Initialize DataTable for the contacts table in the modal
                    $(".modal").on("shown.bs.modal", function() {
                        $(this).find(".contacts-table").DataTable();
                    });
                });

            </script>

    @endsection
</x-master>
