
<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>{{$module->software->code}} - {{$module->software->name}}</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('administrator.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('administrator-software.index')}}">View Software</a></li>
                </ol>
            </nav>
        </div>
    @endsection



    @section('content')
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="card">
                        <div class="card-body pt-3">
                            <form action="{{route('administrator-software.update-software-module', [$module->id])}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <x-form-floating name="name" type="text" placeholder="Requirement" value="{{$module->name}}">
                                            <x-validation name="name"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-form-floating name="description" type="text" placeholder="Description" value="{{$module->description}}">
                                            <x-validation name="description"></x-validation>
                                        </x-form-floating>
                                    </div>



                                    <div class="col-12 mb-3 ">
                                        <div class="float-end">
                                            <button class="btn btn-outline-primary">Update Software Module</button>
                                            <button type="reset" class="btn btn-outline-dark">Reset</button>
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
</x-master>