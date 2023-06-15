<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Update Ticket Template</h1>
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
                            <form action="{{route('master-ticket-template.update', [$ticket_template->id])}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <textarea class="tinymce-editor @error('cont') is-invalid @enderror" name="cont">{{$ticket_template->cont}}</textarea>
                                                <x-validation name="cont"></x-validation>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3 ">
                                        <button class="btn btn-outline-primary">Update Ticket Template</button>
                                        <button type="reset" class="btn btn-outline-dark">Reset</button>
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
