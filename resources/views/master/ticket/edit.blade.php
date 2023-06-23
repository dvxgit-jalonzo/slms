<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Update Ticket</h1>
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
                            <form action="{{route('master-ticket.update', [$ticket->id])}}" method="POST">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row">


                                            <div class="col-12 mb-3">
                                                <textarea id="description" class="tinymce-editor @error('description') is-invalid @enderror" name="description">{{$ticket->description}}</textarea>
                                                <x-validation name="description"></x-validation>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <select id="client_id" class="form-select" name="client_id">
                                                    <option value="">Choose Client</option>
                                                    @foreach($clients as $client)
                                                        <option @if($ticket->client_id == $client->id) selected @endif  value="{{$client->id}}">{{$client->company_name}}</option>
                                                    @endforeach
                                                </select>
                                               <x-validation name="client_id"></x-validation>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <select id="software_id" class="form-select" name="software_id">
                                                    <option value="">Choose Software</option>
                                                    @foreach($softwares as $software)
                                                        <option @if($ticket->software_id == $software->id) selected @endif  value="{{$software->id}}">{{$software->name}}</option>
                                                    @endforeach
                                                </select>
                                                <x-validation name="software_id"></x-validation>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <x-form-floating id="ticket_number" name="ticket_number" type="text" readonly placeholder="Double to copy Ticket Number" value="{{$ticket->ticket_number}}">
                                                    <x-validation name="ticket_number"></x-validation>
                                                </x-form-floating>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <input type="text" id="sn" placeholder="Serial Number"  class="form-control" readonly>

                                            </div>
                                            <div class="col-12 mb-3">
                                                <x-form-floating name="title" type="text" placeholder="Title" value="{{$ticket->title}}">
                                                    <x-validation name="title"></x-validation>
                                                </x-form-floating>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <select id="category_id" class="form-select" name="category_id">
                                                    <option value="">Choose Category</option>
                                                    @foreach($categories as $category)
                                                        <option @if($ticket->category_id == $category->id) selected @endif  value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>

                                                <x-validation name="category_id"></x-validation>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <select id="status_id" class="form-select" name="status_id">
                                                    <option value="">Choose Status</option>
                                                    @foreach($statuses as $status)
                                                        <option @if($ticket->status_id == $status->id) selected @endif  value="{{$status->id}}">{{$status->name}}</option>
                                                    @endforeach
                                                </select>

                                                <x-validation name="status_id"></x-validation>
                                            </div>

                                            <div class="col-12 mb-3 hidden">
                                                <input type="text"  readonly class="form-control" value="{{$ticket->assignedToUser->name}}">
                                                <input type="text" hidden id="assigned_to" name="assigned_to" readonly class="form-control" value="{{$ticket->id}}">
                                            </div>

                                            <div class="col-12 mb-3">
                                                <div class="btn-group">
                                                    <input id="low" @if($ticket->priority == "low") checked @endif class="btn-check" type="radio" name="priority" value="low">
                                                    <label for="low" class="btn btn-outline-secondary">Low</label>

                                                    <input id="medium" @if($ticket->priority == "medium") checked @endif class="btn-check" type="radio" name="priority" value="medium">
                                                    <label for="medium" class="btn btn-outline-secondary">Medium</label>

                                                    <input id="high" @if($ticket->priority == "high") checked @endif class="btn-check" type="radio" name="priority" value="high">
                                                    <label for="high" class="btn btn-outline-secondary">High</label>

                                                    <input id="urgent" @if($ticket->priority == "urgent") checked @endif class="btn-check" type="radio" name="priority" value="urgent">
                                                    <label for="urgent" class="btn btn-outline-secondary">Urgent</label>
                                                </div>
                                                <x-validation name="priority"></x-validation>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3 ">
                                        <div class="float-end">
                                            <button class="btn btn-outline-primary">Update Ticket</button>
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

                let cli = {{$ticket->client_id}}, soft = {{$ticket->software_id}};


                var template = $("#description").val();
                var currentDate = new Date().toISOString().slice(0, 10);

                let filledTemplate = template.replace(/{date_today}/g, currentDate);
                $("#description").val(filledTemplate);


                let software_code = "";
                let client_code = "";
                let ticket_number = "";

                $('#sn').dblclick(function() {
                    var input = $(this);
                    input.select();
                    document.execCommand('copy');
                    toastr.success('Serial Number Copied!');
                });


                $('#ticket_number').dblclick(function() {
                    $.ajax({
                        url: "{{route('master-license.get-license-serial')}}",
                        method: "GET",
                        data: {client_id : cli, software_id : soft},
                        success: function (response){
                            $("#sn").val(response);
                        }
                    });

                    var input = $(this);

                    input.select();
                    document.execCommand('copy');
                    toastr.success('Ticket Number Copied!');
                });


                $.ajax({
                    url: "{{route('master-license.get-last-id')}}",
                    method: "GET",
                    success: function (response){
                        let  number = response;
                        $("#software_id").on("change", function (){
                            var selectedLabel = $(this).find("option:selected").text();
                            var tempInput = $("<input>");
                            $("body").append(tempInput);
                            tempInput.val(selectedLabel).select();
                            document.execCommand("copy");
                            tempInput.remove();
                            toastr.success("Software copied, please paste first.");

                            var software_id = $(this).val();
                            soft = software_id;
                            $.ajax({
                                url: "{{route('master-software.get-software-code')}}",
                                method: "GET",
                                data: {
                                    software_id: software_id
                                },
                                success: function(response) {
                                    software_code = response[0].code;
                                    ticket_number = software_code+""+client_code+"-"+number;
                                    $("#ticket_number").val(ticket_number);
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
                            var selectedLabel = $(this).find("option:selected").text();
                            var tempInput = $("<input>");
                            $("body").append(tempInput);
                            tempInput.val(selectedLabel).select();
                            document.execCommand("copy");
                            tempInput.remove();
                            toastr.success("Client copied, please paste first.");
                            var client_id = $(this).val();
                            cli = client_id;
                            $.ajax({
                                url: "{{route('master-client.get-client-code')}}",
                                method: "GET",
                                data: {
                                    client_id: client_id
                                },
                                success: function(response) {
                                    client_code = response[0].code;
                                    ticket_number = software_code+""+client_code+"-"+number;
                                    $("#ticket_number").val(ticket_number);
                                },
                            })
                        });
                    }
                });

                $("#status_id").on("change", function (){
                    var selectedLabel = $(this).find("option:selected").text();
                    navigator.clipboard.writeText(selectedLabel).then(()=>{
                        toastr.success(selectedLabel+" copied to clipboard.");
                    });
                });



            });
        </script>

    @endsection
</x-master>
