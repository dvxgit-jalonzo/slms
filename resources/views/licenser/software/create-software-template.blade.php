<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>{{$software->code}} - {{$software->name}}</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('master-software.index')}}">View Software</a></li>
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
                            <form action="{{route('master-software.store-software-template', [$software->id])}}" method="POST">
                                @csrf
                                <div class="row" >
                                    <div class="col-12">
                                        <div class="row" id="inputs">

                                        </div>
                                    </div>

                                    <div class="col-12 mb-3 ">
                                        <div class="float-end">
                                            <button class="btn btn-outline-info" type="button" id="add">Add</button>
                                            <button class="btn btn-outline-primary">Add Software Template</button>
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
            <script>
                $("#add").on("click", function (){
                    var inputs = $("#inputs");

                    var label = `<div class="col-lg-4 mb-3">
            <x-form-floating name="label[]" type="text" class="text-uppercase" placeholder="Label" value="{{old('label')}}">
                <x-validation name="label"></x-validation>
            </x-form-floating>
        </div>`;

                    var key = `<div class="col-lg-4 mb-3">
            <x-form-floating name="name[]" type="text" class="text-uppercase" placeholder="Name" value="{{old('name')}}">
                <x-validation name="name"></x-validation>
            </x-form-floating>
        </div>`;



            var value = `<div class="col-lg-4 mb-3">
            <x-form-floating name="value[]" type="text" placeholder="Value" value="{{old('value')}}">
                <x-validation name="value"></x-validation>
            </x-form-floating>
        </div>`;
                    inputs.append(label);
                    inputs.append(key);
                    inputs.append(value);
                });
            </script>

    @endsection
</x-master>
