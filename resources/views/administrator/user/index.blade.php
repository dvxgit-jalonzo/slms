<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Users</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('administrator.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('administrator-user.create')}}">Create User</a></li>
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
                                <td>CreatedAt</td>
                                <td>CreatedAt</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
{{--                                @role('Administrator')--}}
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->getRoleNames()->first()}}</td>
                                    <td>
                                        <a href="{{route('administrator-user.edit', [$user->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                    <td><a href="{{ route('administrator-user.destroy', [$user->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
                                </tr>
{{--                                @endrole--}}
{{--                                @if(auth()->user()->getRoleNames()->first() == "Administrator")--}}
{{--                                   --}}
{{--                                @else--}}

{{--                                @endif--}}

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
