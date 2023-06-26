<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Reports</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>

                    <li class="breadcrumb-item"><a href="{{route('master-report.create')}}">Create Report</a></li>
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
                                <td>Author</td>
                                <td>Status</td>
                                <td>Priority</td>
                                <td>CreatedAt</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reports as $report)
                                <tr>
                                    <td>{{$report->title}}</td>
                                    <td>{!! $report->description !!}</td>
                                    <td>{{$report->author->name}}</td>
                                    <td>{{$report->status->name}}</td>
                                    <td>{{$report->priority}}</td>
                                    <td>{{$report->created_at}}</td>
                                    <td>
                                        <a href="{{route('master-report.edit', [$report->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                    <td><a href="{{ route('master-report.destroy', [$report->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
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
