<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Create Category</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('master-status.index')}}">View Status</a></li>
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
                            <form action="{{route('master-category.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <x-form-floating name="name" type="text" placeholder="Name" value="{{old('name')}}">
                                            <x-validation name="name"></x-validation>
                                        </x-form-floating>
                                    </div>
                                    <div class="col-12 mb-3 ">
                                        <div class="float-end">
                                            <button class="btn btn-outline-primary">Create Category</button>
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


    @section('script')


    @endsection
</x-master>
