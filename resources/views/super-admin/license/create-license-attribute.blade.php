<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>{{$license->client->company_name}} - {{$license->serial_number}}</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('super-admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('super-admin-license.index')}}">View License</a></li>
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
                            <form action="{{route('super-admin-license.store-attribute', [$license->id])}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <x-form-floating name="key" type="text" placeholder="Key Name" value="{{old('key')}}">
                                            <x-validation name="key"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-form-floating name="value" type="text" placeholder="Value" value="{{old('value')}}">
                                            <x-validation name="value"></x-validation>
                                        </x-form-floating>
                                    </div>



                                    <div class="col-12 mb-3 ">
                                        <div class="float-end">
                                            <button class="btn btn-outline-primary">Add Attribute</button>
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
