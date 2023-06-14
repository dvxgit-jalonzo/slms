<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Edit Role</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('master-role.index')}}">View Roles</a></li>
                </ol>
            </nav>
        </div>
    @endsection



    @section('content')
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="card">
                        <div class="card-body pt-3">
                            <form action="{{route('master-role.update' , [$role->id])}}" method="POST">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <x-form-floating name="name" placeholder="Role Name" value="{{$role->name}}">
                                            <x-validation name="name"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <div class="float-end">
                                            <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                            <button type="submit" class="btn btn-sm  btn-primary">Update Role</button>
                                        </div>

                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="card">
                        <div class="card-body pt-3">
                            <form action="{{route('master-role.updatePermission' , [$role->id])}}" method="POST">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th><span class="bi bi-check"></span></th>
                                                    <th>Permission</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($permissions as $permission)
                                                <tr class="text-center">
                                                    <td >
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" value="{{$permission->id}}" name="permission_id[]" type="checkbox" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                        </div>
                                                    </td>
                                                    <td>{{$permission->name}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>

                                    <div class="col-12 mb-3">
                                        <div class="float-end">
                                            <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                            <button type="submit" class="btn btn-sm  btn-primary">Update Permission</button>
                                        </div>

                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection


    @section('script')


    @endsection
</x-master>
