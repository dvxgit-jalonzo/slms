<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Edit Report</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('master-report.index')}}">View Report</a></li>
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
                            <form action="{{route('master-report.update', [$report->id])}}" method="POST">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <div class="col-8">
                                        <div class="row">


                                            <div class="col-12 mb-3">

                                                <textarea class="tinymce-editor @error('description') is-invalid @enderror" name="description">{{$report->description}}</textarea>
                                                <x-validation name="description"></x-validation>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            {{--                                            <div class="col-12 mb-3">--}}
                                            {{--                                                <x-select id="category_id" name="category_id" :data="$categories" column_val="id" column="name" placeholder="Choose Category"></x-select>--}}
                                            {{--                                                <x-validation name="category_id"></x-validation>--}}
                                            {{--                                            </div>--}}
                                            <div class="col-12 mb-3">
                                                <x-form-floating name="title" type="text" placeholder="Title" value="{{$report->title}}">
                                                    <x-validation name="title"></x-validation>
                                                </x-form-floating>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <x-select id="status_id" name="status_id" :data="$statuses" column_val="id" column="name" value="{{$report->status_id}}" placeholder="Choose Status"></x-select>
                                                <x-validation name="status_id"></x-validation>
                                            </div>


                                            <div class="col-12 mb-3">
                                                <div class="btn-group">
                                                    <input id="low" class="btn-check" checked type="radio" @if($report->priority == "low") checked @endif name="priority" value="low">
                                                    <label for="low" class="btn btn-outline-secondary">Low</label>

                                                    <input id="medium" class="btn-check" type="radio" @if($report->priority == "medium") checked @endif name="priority" value="medium">
                                                    <label for="medium" class="btn btn-outline-secondary">Medium</label>

                                                    <input id="high" class="btn-check" type="radio" @if($report->priority == "high") checked @endif name="priority" value="high">
                                                    <label for="high" class="btn btn-outline-secondary">High</label>

                                                    <input id="urgent" class="btn-check" type="radio" @if($report->priority == "urgent") checked @endif name="priority" value="urgent">
                                                    <label for="urgent" class="btn btn-outline-secondary">Urgent</label>
                                                </div>
                                                <x-validation name="priority"></x-validation>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3 ">
                                        <div class="float-end">
                                            <button class="btn btn-outline-primary">Update Report</button>
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
