<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Softwares</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('administrator.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('administrator-software.create')}}">Create Software</a></li>
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

                                    <td>
                                        @if($sft->with_licensing == '1')
                                            <i class="bi bi-check text-success fs-4"></i>
                                        @else
                                            <i class="bi bi-x text-danger fs-4"></i>
                                        @endif
                                    </td>
                                    <td>{{$sft->created_at}}</td>
                                    <td>

                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-info dropdown-toggle" type="button" id="actions" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>
                                            <ul class="dropdown-menu" >
                                                <li>
                                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#tableModule{{$sft->id}}">Modules</button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#tableSoftware{{$sft->id}}">Requirements</button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#tableTemplate{{$sft->id}}">Template</button>
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
                                                        <a href="{{route('administrator-software.create-software-module', [$sft->id])}}" class="btn btn-sm btn-outline-primary mb-3"><i class="bi bi-person-add"></i> Software Modules</a>
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
                                                                        <td><a href="{{route('administrator-software.edit-software-module', [$module->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                                                        <td><a href="{{ route('administrator-software.destroy-software-module', [$module->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>

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
                                                        <a href="{{route('administrator-software.create-software-template', [$sft->id])}}" class="btn btn-sm btn-outline-primary mb-3"><i class="bi bi-person-add"></i> Software Template</a>
                                                        <div class="table-responsive">
                                                            <table class="table table-sm templates-table" >
                                                                <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Value</th>
                                                                    <th>Edit</th>
                                                                    <th>Delete</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($sft->software_templates as $template)
                                                                    <tr>
                                                                        <td>{{$template->name}}</td>
                                                                        <td>{{$template->value}}</td>
                                                                        <td><a href="{{route('administrator-software.edit-software-template', [$template->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                                                        <td><a href="{{ route('administrator-software.destroy-software-template', [$template->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>

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
                                                        <a href="{{route('administrator-software.show', [$sft->id])}}" class="btn btn-sm btn-outline-primary mb-3"><i class="bi bi-person-add"></i> Software Requirement</a>
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
                                                                        <td><a href="{{route('administrator-software.edit-software-requirement', [$requirement->id])}}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                                                        <td><a href="{{ route('administrator-software.destroy-software-requirement', [$requirement->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>

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
                                        <a href="{{route('administrator-software.edit', [$sft->id])}}" class="btn btn-sm btn-outline-dark">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('administrator-software.destroy', [$sft->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a>
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
                    $("#table").DataTable();

                    $(".modal").on('shown.bs.modal', function (){
                        $(this).find('.requirements-table').DataTable();
                    });

                    $(".modal").on('shown.bs.modal', function (){
                        $(this).find('.softwares-table').DataTable();
                    });

                    $(".modal").on('shown.bs.modal', function (){
                        $(this).find('.templates-table').DataTable();
                    });
                });
            </script>

    @endsection
</x-master>
