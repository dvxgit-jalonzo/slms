<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Users</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('master-user.create')}}">Create User</a></li>
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
                                <td>Name</td>
                                <td>Email</td>
                                <td>Username</td>
                                <td>Role</td>
                                <td>CreatedAt</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->getRoleNames()->first()}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        <a href="{{route('master-user.edit', [$user->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                    <td><a href="{{ route('master-user.destroy', [$user->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
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
                    $("#table").DataTable({
                        dom: "Bfrtip",
                        buttons: [
                            {
                                extend: "pdfHtml5",
                                filename: "Users-{{now()}}",
                                title: 'Users as of {{now()->format('F d,Y')}}',
                                exportOptions: {
                                    columns: [0,1,2,3,4] // Specify the index of the specific column to be exported (zero-based)
                                }
                            },
                            {
                                extend: "print",
                                filename: "Users-{{now()}}",
                                title: 'Users as of {{now()->format('F d, Y')}}',
                                exportOptions: {
                                    columns: [0,1,2,3,4] // Specify the index of the specific column to be exported (zero-based)
                                }
                            },
                            {
                                extend: "excel",
                                filename: "Users-{{now()}}",
                                title: 'Users as of {{now()->format('F d, Y')}}',
                                exportOptions: {
                                    columns: [0,1,2,3,4] // Specify the index of the specific column to be exported (zero-based)
                                }
                            }
                        ]
                    });
                });
            </script>

    @endsection
</x-master>
