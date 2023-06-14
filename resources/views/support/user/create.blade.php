<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Create User</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('master-user.index')}}">View User</a></li>
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
                            <form action="{{route('master-user.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <x-form-floating name="name" type="text" placeholder="Name" value="{{old('name')}}">
                                            <x-validation name="name"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-form-floating name="username" type="text" placeholder="Username" value="{{old('username')}}">
                                            <x-validation name="username"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-form-floating name="email" type="text" placeholder="Email" value="{{old('email')}}">
                                            <x-validation name="email"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-form-floating name="password" type="password" placeholder="Password">
                                            <x-validation name="password"></x-validation>
                                        </x-form-floating>
                                    </div>



                                    <div class="col-12 mb-3">
                                        <x-select id="role" name="role" placeholder="Choose Role" column_val="name" :data="$roles" column="name"></x-select>
                                        <x-validation name="role"></x-validation>
                                    </div>

{{--                                    Super Admin - all access--}}
{{--                                    Administrator - all access but should not be able to see the Super Admin in Users Management.--}}
{{--                                    Developer - all access with additional accesses to extra dev tools in the system.--}}
{{--                                    Licenser - can only access Licensing Module.--}}
{{--                                    Support - can only access Trouble Ticket and Report Module.--}}

                                    <div class="col-12 mb-3 ">
                                        <div class="float-end">
                                            <button class="btn btn-outline-primary">Create User</button>
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
