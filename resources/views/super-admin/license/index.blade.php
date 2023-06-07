<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Licenses</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('super-admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('super-admin-license.create')}}">Generate License</a></li>
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
                                <td>Client</td>
                                <td>Dat</td>
                                <td>Serial</td>
                                <td>CreatedAt</td>
                                <td>Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($licenses as $license)
                                <tr>
                                    <td>{{$license->client->company_name}}</td>
                                    <td>{{$license->dat_file}}</td>
                                    <td>{{$license->serial_number}}</td>
                                    <td>{{$license->created_at}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#tableAttribute{{$license->id}}">Attribute</button>
                                            <div class="modal fade " id="tableAttribute{{$license->id}}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                Attributes
                                                            </h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <a href="{{route('super-admin-license.create-attribute', [$license->id])}}" class="btn btn-sm btn-outline-primary mb-3"><i class="bi bi-person-add"></i> Add Attribute</a>
                                                            <div class="table-responsive">
                                                                <table class="table table-sm attributes-table" >
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Key Name</th>
                                                                        <th>Value</th>
                                                                        <th>Edit</th>
                                                                        <th>Delete</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($license->attributes as $attrib)
                                                                        <tr>
                                                                            <td>{{$attrib->key}}</td>
                                                                            <td>{{$attrib->value}}</td>
                                                                            <td><a href="{{route('super-admin-license.edit-attribute', [$attrib->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                                                            <td><a href="{{ route('super-admin-license.destroy-attribute', [$attrib->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>

                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#tableRemote{{$license->id}}">Remote</button>
                                            <div class="modal fade " id="tableRemote{{$license->id}}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                Remote Access
                                                            </h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <a href="{{route('super-admin-license.show', [$license->id])}}" class="btn btn-sm btn-outline-primary mb-3"><i class="bi bi-person-add"></i> Add Remote</a>
                                                            <div class="table-responsive">
                                                                <table class="table table-sm remotes-table" >
                                                                    <thead>
                                                                    <tr>
                                                                        <th>App Name</th>
                                                                        <th>Username</th>
                                                                        <th>Password</th>
                                                                        <th>Edit</th>
                                                                        <th>Delete</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($license->remoteAccess as $remote)
                                                                        <tr>
                                                                            <td>{{$remote->application}}</td>
                                                                            <td>{{$remote->username}}</td>
                                                                            <td>{{$remote->password}}</td>
                                                                            <td><a href="{{route('super-admin-license.edit-remote-access', [$remote->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                                                            <td><a href="{{ route('super-admin-license.destroy-remote-access', [$remote->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>

                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{route('super-admin-licence.view-license', [$license->id])}}" class="btn btn-sm btn-outline-secondary">View License</a>
                                            <a href="{{ route('super-admin-license.destroy', [$license->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a>
                                        </div>
                                    </td>
{{--                                    <td><a href="{{route('super-admin-license.edit', [$license->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>--}}
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

                    $(".modal").on("shown.bs.modal", function() {
                        $(this).find(".remotes-table").DataTable();
                    });

                    $(".modal").on("shown.bs.modal", function() {
                        $(this).find(".attributes-table").DataTable();
                    });
                });
            </script>

    @endsection
</x-master>
