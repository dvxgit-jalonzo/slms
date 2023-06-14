<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Edit Permission</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('master-permission.index')}}">View Permissions</a></li>
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
                            <form action="{{route('master-permission.update' , [$permission->id])}}" method="POST">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <x-form-floating name="name" placeholder="Permission Name" value="{{$permission->name}}">
                                            <x-validation name="name"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <div class="float-end">
                                            <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                            <button type="submit" class="btn btn-sm  btn-primary">Update changes</button>
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
