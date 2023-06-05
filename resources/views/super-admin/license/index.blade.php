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
{{--                                <td>Edit</td>--}}
                                <td>Delete</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($licenses as $license)
                                <tr>
                                    <td>{{$license->client->company_name}}</td>
                                    <td>{{$license->dat_file}}</td>
                                    <td>{{$license->serial_number}}</td>
                                    <td>{{$license->created_at}}</td>
{{--                                    <td><a href="{{route('super-admin-license.edit', [$license->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>--}}
                                    <td><a href="{{ route('super-admin-license.destroy', [$license->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
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
