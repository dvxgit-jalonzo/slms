<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Generate License</h1>
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
            <form action="{{route('master-license.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="card">
                            <div class="card-body pt-3">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <x-form-floating name="serial_number" type="text" pattern="[0-9]{1,6}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 6)" placeholder="Serial Number" value="{{old('serial_number') ?: $serial}}">
                                            <x-validation name="serial_number"></x-validation>
                                        </x-form-floating>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <x-select id="client_id" name="client_id" placeholder="Client" :data="$clients" column_val="id" column="company_name"></x-select>
                                    </div>


                                    <div class="col-lg-12 mb-3">
                                        <x-select id="software_id" name="software_id" placeholder="Software" :data="$softwares" column_val="id" column="name"></x-select>
                                    </div>


                                    <div class="col-lg-12 mb-3">
                                        <div class="form-floating">
                                            <input type="file" id="jsonFileInput" placeholder="Upload License" accept=".json" class="form-control" onchange="readFileContent()">
                                            <label for="text-muted">Upload License</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <x-form-floating name="installation_date" class="installation_date" type="date"  placeholder="Installation Date" value="{{old('installation_date')}}">
                                            <x-validation name="installation_date"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <x-form-floating name="expiration_date" class="expiration_date" type="date"  placeholder="Expiration Date" value="{{old('expiration_date')}}">
                                            <x-validation name="expiration_date"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <x-form-floating name="sma_expiration" class="sma_expiration" type="date"  placeholder="SMA Expiration" value="{{old('sma_expiration')}}">
                                            <x-validation name="sma_expiration"></x-validation>
                                        </x-form-floating>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="card">
                            <div class="card-body pt-3">
                                <div class="row">
                                    <div class="col-12 mb-3" id="">
                                        <div class="row" id="duplicate">

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12 col-12">
                        <div class="float-end">
                            <button class="btn btn-outline-primary">Generate</button>
                            <button type="reset" class="btn btn-outline-dark">Reset</button>
                        </div>
                    </div>

                </div>
            </form>



        </section>
    @endsection


    @section('script')
            <script>

                $("#installation_date").flatpickr();
                $("#expiration_date").flatpickr();
                $("#sma_expiration").flatpickr();


                let json;

                function readFileContent() {
                    const fileInput = document.getElementById('jsonFileInput');
                    if (fileInput.files && fileInput.files[0]) {
                        const reader = new FileReader();

                        reader.onload = function (e) {
                            const fileContent = e.target.result;

                            const decryptUrl = "{{route('master-decrypt.content')}}";

                            $.ajax({
                                url: decryptUrl,
                                type: 'POST',
                                contentType: 'application/json',
                                data: JSON.stringify({ fileContent }),
                                success: function (decryptedContent) {
                                    // console.log(decryptedContent);
                                    try {
                                        const js = JSON.parse(decryptedContent);

                                        $.each(js, function (index, value) {

                                            if(index == "_DATEINSTALL"){
                                                $(".installation_date").val(value);
                                            }
                                            if(index == "_DATEEXPIRE"){
                                                $(".expiration_date").val(value);
                                            }
                                            if(index == "_SMAEXPIRE"){
                                                $(".sma_expiration").val(value);
                                            }
                                            const column = $("#" + index);
                                            if (value === null) {
                                                column.val("");
                                            } else {
                                                column.val(value);
                                            }
                                        });
                                    } catch (error) {
                                        console.error('Error parsing decrypted JSON file:', error);
                                    }

                                },
                                error: function (xhr, status, error) {
                                    console.error('Error decrypting JSON file:', error);
                                }
                            });





                        };

                        reader.readAsText(fileInput.files[0]);
                    }


                }


                $("#software_id").on("change", function () {
                    var duplicate = $("#duplicate");
                    duplicate.empty();
                    var to_search = $(this).val();
                    var url = "{{ route('master-software.get-template', ['id' => ':id']) }}";
                    url = url.replace(':id', to_search);
                    var apiURL = url;
                    $.ajax({
                        url: apiURL,
                        method: "GET",
                        data: { software_id: to_search },
                        success: function (response) {
                            // console.log(response[0]);
                            // var template = response[0].template;
                            $.each(response, function(item, element){
                                var val = element.value;
                                if(val){
                                    val = element.value
                                }else{
                                    val = "";
                                }
                                var input = `<div class="col-12">
                                                <div class="row">
                                                    <div class="col-4"><label for="">`+element.label+`</label>
                                                        <input hidden id="temp`+element.name+`" class="form-control" name="name[]" value="`+element.name+`" placeholder="Name" type="text">


                                                    </div>
                                                    <div class="col-8">
                                                        <input id="`+element.name+`" class="form-control border-0 border-bottom " style="outline: none; box-shadow: none;" name="value[]" value="`+val+`"  type="text">
                                                    </div>
                                                </div>
                                            </div>`;
                                duplicate.append(""+input+"");
                            });
                            // template
                            // duplicate.html(""+template+"");
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });

                    {{--const softwareId = $("#software_id").val(); // Replace with your software ID--}}
                    {{--const clientId = $("#client_id  ").val();--}}



                    {{--$.ajax({--}}
                    {{--    url: "{{route('master-check-exist.license')}}",--}}
                    {{--    type: 'GET',--}}
                    {{--    data: {--}}
                    {{--        software_id: softwareId,--}}
                    {{--        client_id: clientId,--}}
                    {{--    },--}}
                    {{--    success: function(response) {--}}
                    {{--        // Handle the response data--}}
                    {{--        console.log(response);--}}
                    {{--        if(response[0]){--}}
                    {{--            $(".installation_date").val(response[0].installation_date)--}}
                    {{--            $(".expiration_date").val(response[0].expiration_date)--}}
                    {{--            $(".sma_expiration").val(response[0].sma_expiration)--}}
                    {{--        }--}}

                    {{--    },--}}
                    {{--    error: function(xhr, status, error) {--}}
                    {{--        // Handle the error--}}
                    {{--        console.error(error);--}}
                    {{--    }--}}
                    {{--});--}}
                });

            </script>

    @endsection
</x-master>
