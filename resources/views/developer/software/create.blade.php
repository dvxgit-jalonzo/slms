<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Create Software</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('developer.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('developer-software.index')}}">View Software</a></li>
                </ol>
            </nav>
        </div>
    @endsection



    @section('content')
        <section class="section dashboard">
            <form action="{{route('developer-software.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="card">
                            <div class="card-body pt-3">
                                <div class="row">
                                        <div class="col-12 mb-3">
                                            <x-form-floating name="code" type="text" maxlength="5" placeholder="Code" value="{{old('code')}}">
                                                <x-validation name="code"></x-validation>
                                            </x-form-floating>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <x-form-floating name="name" type="text" placeholder="Name" value="{{old('name')}}">
                                                <x-validation name="name"></x-validation>
                                            </x-form-floating>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <x-form-floating name="description" type="text" placeholder="Description" value="{{old('description')}}">
                                                <x-validation name="description"></x-validation>
                                            </x-form-floating>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="with_licensing" class="form-check-input">
                                                <label for="">With Licensing ?</label>
                                            </div>

                                        </div>

                                        <div class="col-12 mb-3 ">
                                            <div class="float-end">
                                                <button class="btn btn-outline-primary">Create Software</button>
                                                <button type="reset" class="btn btn-outline-dark">Reset</button>
                                            </div>

                                        </div>


                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="card">
                            <div class="card-body pt-3">
                                <label for="" class="text-muted ms-2 mb-2 fw-semibold">Template Design</label>
                                <textarea class="tinymce-editor @error('template') is-invalid @enderror" name="template">{{old('template')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    @endsection
</x-master>
