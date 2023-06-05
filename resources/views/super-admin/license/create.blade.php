<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Generate License</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('super-admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('super-admin-license.index')}}">View License</a></li>
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
                            <form action="{{route('super-admin-license.store')}}" method="POST">
                                @csrf

                                <div class="col-lg-ide3 mb-3">
                                    <x-form-floating name="serial_number" type="text" pattern="[0-9]{1,6}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 6)" placeholder="Serial Number" value="{{old('serial_number') ?: $serial}}">
                                        <x-validation name="serial_number"></x-validation>
                                    </x-form-floating>
                                </div>
                                <div class="col-lg-ide3 mb-3">
                                    <x-select id="client_id" name="client_id" placeholder="Client" :data="$clients" column_val="id" column="company_name"></x-select>
                                </div>

                                <div class="col-lg-ide3 mb-3">
                                    <x-select id="software_id" name="software_id" placeholder="Software" :data="$softwares" column_val="id" column="name"></x-select>
                                </div>
                                    <div class="col-12 mb-3 ">
                                        <div class="float-end">
                                            <button class="btn btn-outline-primary">Generate</button>
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
