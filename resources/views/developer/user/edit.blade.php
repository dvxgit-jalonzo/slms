<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Edit User</h1>
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
                            <form action="{{route('master-user.update', [$user->id])}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <x-form-floating name="name" type="text" placeholder="Name" value="{{$user->name}}">
                                            <x-validation name="name"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-form-floating name="username" type="text" placeholder="Username" value="{{$user->username}}">
                                            <x-validation name="username"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-form-floating name="email" type="text" placeholder="Email" value="{{$user->email}}">
                                            <x-validation name="email"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-select id="role" name="role" placeholder="Choose Role" :data="$roles" column_val="name" column="name" value="{{$user->getRoleNames()->first()}}"></x-select>
                                        <x-validation name="role"></x-validation>

                                    </div>


                                    <div class="col-12 mb-3 ">
                                        <div class="float-end">
                                            <button class="btn btn-outline-primary">Update User</button>
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
                $( '#select' ).select2( {
                    theme: "bootstrap-5",
                    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                    placeholder: $( this ).data( 'placeholder' ),
                } );
            });
        </script>
    @endsection
</x-master>
