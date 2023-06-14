<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>{{$license->client->company_name}} - {{$license->serial_number}}</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('master-license.index')}}">View License</a></li>
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
                            <form action="{{route('master-license.store-remote-access', [$license->id])}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <x-form-floating name="application" type="text" placeholder="Remote Application / Software" value="{{old('application')}}">
                                            <x-validation name="application"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-form-floating name="username" type="text" placeholder="Username" value="{{old('username')}}">
                                            <x-validation name="username"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-form-floating name="password" type="text" placeholder="Password" value="{{old('password')}}">
                                            <x-validation name="password"></x-validation>
                                        </x-form-floating>
                                    </div>



                                    <div class="col-12 mb-3 ">
                                        <div class="float-end">
                                            <button class="btn btn-outline-primary">Add Remote Access</button>
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
