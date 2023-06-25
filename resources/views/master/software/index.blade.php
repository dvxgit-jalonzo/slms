<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Softwares</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('master-software.create')}}">Create Software</a></li>
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
                                <td>Name</td>
                                <td>Description</td>
                                <td>WithLicensing</td>
                                <td>CreatedAt</td>
                                <td>Actions</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($software as $sft)
                                <tr>
                                    <td>{{$sft->code}}</td>
                                    <td>{{$sft->name}}</td>
                                    <td>{{$sft->description}}</td>
                                    <td class="text-center">
                                        @if($sft->with_licensing == '1')
                                            <span class="badge bg-success">YES</span>
                                        @else
                                            <span class="badge bg-dark">NO</span>
                                        @endif
                                    </td>
                                    <td>{{$sft->created_at}}</td>
                                    <td>

                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-info dropdown-toggle" type="button" id="actions" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>
                                            <ul class="dropdown-menu" >
                                                <li>
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#tableModule{{$sft->id}}">Modules</button>
                                                </li>
                                                <li>
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#tableSoftware{{$sft->id}}">Requirements</button>
                                                </li>
                                                <li>
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#tableTemplate{{$sft->id}}">Template</button>
                                                </li>
                                                <li>
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#tableDevice{{$sft->id}}">Devices</button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="modal fade " id="tableModule{{$sft->id}}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Modules
                                                        </h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <a href="{{route('master-software.create-software-module', [$sft->id])}}" class="btn btn-sm btn-outline-primary mb-3"><i class="bi bi-person-add"></i> Software Modules</a>
                                                        <div class="table-responsive">
                                                            <table class="table table-sm softwares-table" >
                                                                <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Description</th>
                                                                    <th>Edit</th>
                                                                    <th>Delete</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($sft->software_unders as $module)
                                                                    <tr>
                                                                        <td>{{$module->name}}</td>
                                                                        <td>{{$module->description}}</td>
                                                                        <td><a href="{{route('master-software.edit-software-module', [$module->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                                                        <td><a href="{{ route('master-software.destroy-software-module', [$module->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>

                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade " id="tableTemplate{{$sft->id}}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Template
                                                        </h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <a href="{{route('master-software.create-software-template', [$sft->id])}}" class="btn btn-sm btn-outline-primary mb-3"><i class="bi bi-person-add"></i> Software Template</a>
                                                        <div class="table-responsive">
                                                            <table class="table table-sm templates-table" >
                                                                <thead>
                                                                <tr>
                                                                    <th>Label</th>
                                                                    <th>Name</th>
                                                                    <th>Value</th>
                                                                    <th>Edit</th>
                                                                    <th>Delete</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($sft->software_templates as $template)
                                                                    <tr>
                                                                        <td>{{$template->label}}</td>
                                                                        <td>{{$template->name}}</td>
                                                                        <td>{{$template->value}}</td>
                                                                        <td><a href="{{route('master-software.edit-software-template', [$template->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                                                        <td><a href="{{ route('master-software.destroy-software-template', [$template->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>

                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade " id="tableSoftware{{$sft->id}}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Requirements
                                                        </h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <a href="{{route('master-software.show', [$sft->id])}}" class="btn btn-sm btn-outline-primary mb-3"><i class="bi bi-person-add"></i> Software Requirement</a>
                                                        <div class="table-responsive">
                                                            <table class="table table-sm requirements-table" >
                                                                <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Specs</th>
                                                                    <th>Edit</th>
                                                                    <th>Delete</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($sft->software_requirements as $requirement)
                                                                    <tr>
                                                                        <td>{{$requirement->name}}</td>
                                                                        <td>{{$requirement->specs}}</td>
                                                                        <td><a href="{{route('master-software.edit-software-requirement', [$requirement->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                                                        <td><a href="{{ route('master-software.destroy-software-requirement', [$requirement->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade " id="tableDevice{{$sft->id}}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Devices
                                                        </h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <a href="{{route('master-software.create-software-device', [$sft->id])}}" class="btn btn-sm btn-outline-primary mb-3"><i class="bi bi-person-add"></i> Software Device</a>
                                                        <div class="table-responsive">
                                                            <table class="table table-sm devices-table" >
                                                                <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Description</th>
                                                                    <th>Edit</th>
                                                                    <th>Delete</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($sft->software_devices as $device)
                                                                    <tr>
                                                                        <td>{{$device->name}}</td>
                                                                        <td>{{$device->description}}</td>
                                                                        <td><a href="{{route('master-software.edit-software-device', [$device->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                                                        <td><a href="{{ route('master-software.destroy-software-device', [$device->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>

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

                                    <td>
                                        <a href="{{route('master-software.edit', [$sft->id])}}" class="btn btn-sm btn-outline-dark">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('master-software.destroy', [$sft->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a>
                                    </td>
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
                                filename: "Softwares-{{now()}}",
                                title: 'Softwares as of {{now()->format('F d,Y')}}',
                                exportOptions: {
                                    columns: [0,1,2,3,4] // Specify the index of the specific column to be exported (zero-based)
                                }
                            },
                            {
                                extend: "print",
                                filename: "Softwares-{{now()}}",
                                title: 'Softwares as of {{now()->format('F d, Y')}}',
                                exportOptions: {
                                    columns: [0,1,2,3,4] // Specify the index of the specific column to be exported (zero-based)
                                }
                            },
                            {
                                extend: "excel",
                                filename: "Softwares-{{now()}}",
                                title: 'Softwares as of {{now()->format('F d, Y')}}',
                                exportOptions: {
                                    columns: [0,1,2,3,4] // Specify the index of the specific column to be exported (zero-based)
                                }
                            },
                        ]
                    });

                    $(".modal").on('shown.bs.modal', function (){
                        $(this).find('.requirements-table').DataTable();
                    });

                    $(".modal").on('shown.bs.modal', function (){
                        $(this).find('.softwares-table').DataTable();
                    });

                    $(".modal").on('shown.bs.modal', function (){
                        $(this).find('.templates-table').DataTable();
                    });

                    $(".modal").on('shown.bs.modal', function (){
                        $(this).find('.devices-table').DataTable();
                    });
                });
            </script>

    @endsection
</x-master>
