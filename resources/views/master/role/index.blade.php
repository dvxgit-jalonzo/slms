<x-master>
    @section('pagetitle')
        <div class="pagetitle">
            <h1>View Roles</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a type="button" data-bs-toggle="modal" data-bs-target="#createRoleModal">Create Role</a></li>
                    <form action="{{route('master-role.store')}}" method="POST">
                        @csrf
                        <div class="modal fade" id="createRoleModal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Create Role</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <x-form-floating name="name" placeholder="Role Name">
                                                    <x-validation name="name"></x-validation>
                                                </x-form-floating>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

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
                                <td>Role Permission</td>
                                <td>CreatedAt</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>

                                        <div class="accordion" id="permission{{$role->id}}">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading{{$role->id}}">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$role->id}}" aria-expanded="true" aria-controls="collapse{{$role->id}}">
                                                        {{$role->name}}
                                                    </button>
                                                </h2>
                                                <div id="collapse{{$role->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$role->id}}" data-bs-parent="#permission{{$role->id}}">
                                                    <div class="accordion-body">

                                                        <div class="row">
                                                            @forelse($role->permissions as $permission)
                                                                <div class="col-6">
                                                                    <small class="text-info" style="pointer-events: none">{{$permission->name}}</small>
                                                                </div>
                                                            @empty
                                                                <small class="text-info" style="pointer-events: none">No Permission Assigned</small>
                                                            @endforelse

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    <td>{{$role->created_at}}</td>
                                    <td>
                                        <a href="{{route('master-role.edit', [$role->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                    <td><a href="{{ route('master-role.destroy', [$role->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
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
