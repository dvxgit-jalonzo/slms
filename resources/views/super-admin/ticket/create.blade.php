<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Create Client</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('super-admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('super-admin-client.index')}}">View Client</a></li>
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
                            <form action="{{route('super-admin-client.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <x-form-floating name="code" type="text" placeholder="Code" value="{{old('code')}}">
                                            <x-validation name="code"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-form-floating name="company_name" type="text" placeholder="Company Name" value="{{old('company_name')}}">
                                            <x-validation name="company_name"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-form-floating name="description" type="text" placeholder="Description" value="{{old('description')}}">
                                            <x-validation name="description"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-form-floating name="location" type="text" placeholder="Location">
                                            <x-validation name="location"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3 ">
                                        <div class="float-end">
                                            <button class="btn btn-outline-primary">Create Client</button>
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
