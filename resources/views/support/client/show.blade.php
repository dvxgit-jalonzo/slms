<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>{{$client->code}} - {{$client->company_name}}</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('master-client.index')}}">View Client</a></li>
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
                            <form action="{{route('master-client.store-contact-person', [$client->id])}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <x-form-floating name="contact_person" type="text" placeholder="Contact Person" value="{{old('contact_person')}}">
                                            <x-validation name="contact_person"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-form-floating name="email" type="text" placeholder="Email" value="{{old('email')}}">
                                            <x-validation name="email"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-form-floating name="contact_number" type="text" placeholder="Contact Number" value="{{old('contact_number')}}">
                                            <x-validation name="contact_number"></x-validation>
                                        </x-form-floating>
                                    </div>



                                    <div class="col-12 mb-3 ">
                                        <div class="float-end">
                                            <button class="btn btn-outline-primary">Add Contact Person</button>
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
