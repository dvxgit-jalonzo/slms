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
                                @method('PUT')
                                <div class="row">
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <x-form-floating name="title" type="text" placeholder="Title" value="{{$ticket->title}}">
                                                    <x-validation name="title"></x-validation>
                                                </x-form-floating>
                                            </div>

                                            <div class="col-12 mb-3">

                                                <textarea id="description" class="@error('description') is-invalid @enderror" name="description">{{$ticket->description}}</textarea>
                                                <x-validation name="description"></x-validation>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <x-select id="category_id" name="category_id" :data="$categories" value="{{$ticket->category_id}}" column_val="id" column="name" placeholder="Choose Category"></x-select>
                                                <x-validation name="category_id"></x-validation>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <x-select id="status_id" name="status_id" :data="$statuses" column_val="id" value="{{$ticket->status_id}}" column="name" placeholder="Choose Status"></x-select>
                                                <x-validation name="status_id"></x-validation>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <x-select id="assigned_to" name="assigned_to" :data="$users" column_val="id" value="{{$ticket->assigned_to}}" column="name" placeholder="Assigned To"></x-select>
                                                <x-validation name="assigned_to"></x-validation>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <div class="btn-group">
                                                    <input id="low" class="btn-check" @if($ticket->priority == "low") checked @endif type="radio" name="priority" value="low">
                                                    <label for="low" class="btn btn-outline-secondary">Low</label>

                                                    <input id="medium" class="btn-check" @if($ticket->priority == "medium") checked @endif type="radio" name="priority" value="medium">
                                                    <label for="medium" class="btn btn-outline-secondary">Medium</label>

                                                    <input id="high" class="btn-check" @if($ticket->priority == "high") checked @endif type="radio" name="priority" value="high">
                                                    <label for="high" class="btn btn-outline-secondary">High</label>

                                                    <input id="urgent" class="btn-check" @if($ticket->priority == "urgent") checked @endif type="radio" name="priority" value="urgent">
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

                $('#select').select2( {
                    theme: "bootstrap-5",
                    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                    placeholder: $( this ).data( 'placeholder' ),
                } );
            });
        </script>

        <script>
            tinymce.init({
                selector: '#description',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                mergetags_list: [
                    { value: 'First.Name', title: 'First Name' },
                    { value: 'Email', title: 'Email' },
                ],
            });
        </script>
    @endsection
</x-master>
