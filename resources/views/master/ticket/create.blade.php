<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Create Ticket</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('master-ticket.index')}}">View Ticket</a></li>
                </ol>
            </nav>
        </div>
    @endsection



    @section('content')
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card">
                        <div class="card-body pt-3">
                            <form action="{{route('master-ticket.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row">


                                            <div class="col-12 mb-3">
                                                <textarea class="tinymce-editor @error('description') is-invalid @enderror" name="description">{{$ticket_template}}</textarea>
                                                <x-validation name="description"></x-validation>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <x-select id="client_id" name="client_id" :data="$clients" column_val="id" column="company_name" placeholder="Choose Client"></x-select>
                                                <x-validation name="client_id"></x-validation>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <x-select id="software_id" name="software_id" :data="$softwares" column_val="id" column="name" placeholder="Choose Software"></x-select>
                                                <x-validation name="software_id"></x-validation>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <x-form-floating id="ticket_number" name="ticket_number" type="text" readonly placeholder="Ticket Number" value="{{old('ticket_number')}}">
                                                    <x-validation name="ticket_number"></x-validation>
                                                </x-form-floating>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <x-form-floating name="title" type="text" placeholder="Title" value="{{old('title')}}">
                                                    <x-validation name="title"></x-validation>
                                                </x-form-floating>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <x-select id="category_id" name="category_id" :data="$categories" column_val="id" column="name" placeholder="Choose Category"></x-select>
                                                <x-validation name="category_id"></x-validation>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <x-select id="status_id" name="status_id" :data="$statuses" column_val="id" column="name" placeholder="Choose Status"></x-select>
                                                <x-validation name="status_id"></x-validation>
                                            </div>

                                            <div class="col-12 mb-3 hidden">
                                                <x-select  id="assigned_to" name="assigned_to" :data="$users" column_val="id" column="name" value="{{auth()->user()->id}}" placeholder="Assigned To"></x-select>
                                                <x-validation name="assigned_to"></x-validation>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <div class="btn-group">
                                                    <input id="low" class="btn-check" checked type="radio" name="priority" value="low">
                                                    <label for="low" class="btn btn-outline-secondary">Low</label>

                                                    <input id="medium" class="btn-check" type="radio" name="priority" value="medium">
                                                    <label for="medium" class="btn btn-outline-secondary">Medium</label>

                                                    <input id="high" class="btn-check" type="radio" name="priority" value="high">
                                                    <label for="high" class="btn btn-outline-secondary">High</label>

                                                    <input id="urgent" class="btn-check" type="radio" name="priority" value="urgent">
                                                    <label for="urgent" class="btn btn-outline-secondary">Urgent</label>
                                                </div>
                                                <x-validation name="priority"></x-validation>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3 ">
                                        <div class="float-end">
                                            <button class="btn btn-outline-primary">Create Ticket</button>
                                            <button type="reset" class="btn btn-outline-dark">Reset</button>
                                        </div>
                                    </div>
                                    <input type="text" hidden id="number">
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
            $(document).ready(function() {




                let software_code = "";
                let client_code = "";
                let ticker_number = "";


                $('#select').select2( {
                    theme: "bootstrap-5",
                    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                    placeholder: $( this ).data( 'placeholder' ),
                } );




                $.ajax({
                    url: "{{route('master-license.get-last-id')}}",
                    method: "GET",
                    success: function (response){
                        let  number = response;
                        $("#software_id").on("change", function (){
                            var software_id = $(this).val();
                            $.ajax({
                                url: "{{route('master-software.get-software-code')}}",
                                method: "GET",
                                data: {
                                    software_id: software_id
                                },
                                success: function(response) {
                                    console.log(response[0].code);
                                    software_code = response[0].code;
                                    ticker_number = software_code+""+client_code+"-"+number;
                                    $("#ticket_number").val(ticker_number);
                                },
                            })
                        });
                    }
                });


                $.ajax({
                    url: "{{route('master-license.get-last-id')}}",
                    method: "GET",
                    success: function (response){
                        let  number = response;

                        $("#client_id").on("change", function (){
                            var client_id = $(this).val();
                            $.ajax({
                                url: "{{route('master-client.get-client-code')}}",
                                method: "GET",
                                data: {
                                    client_id: client_id
                                },
                                success: function(response) {
                                    console.log(response[0].code);
                                    client_code = response[0].code;
                                    ticker_number = software_code+""+client_code+"-"+number;
                                    $("#ticket_number").val(ticker_number);
                                },
                            })
                        });
                    }
                });



            });
        </script>

    @endsection
</x-master>
