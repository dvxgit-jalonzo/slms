<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>{{$license->client->company_name}} - {{$license->client->code}}</h1>
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
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="card shadow-lg">
                        <div class="card-body  rounded pt-3">
                            <ul class="list-group">
                                @foreach($json as $key => $value)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ optional($license->software->software_templates->firstWhere('name', $key))->label }}

                                        <span class="badge text-primary rounded">{{$value}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
</x-master>
