

<x-master>


    @section('pagetitle')
        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                </ol>
            </nav>
        </div>
    @endsection



    @section('content')
        <section class="section contact">
            <div class="row">

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            @if(auth()->user()->profile)
                                <img src="{{asset('storage/profile')."/".auth()->user()->profile->picture}}" alt="Profile" class="img-thumbnail mb-3">
                            @else
                                <img src="{{asset('NiceAdmin/assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
                            @endif


                            <h2>{{auth()->user()->name}}</h2>
                            <span>{{auth()->user()->username}}</span>
                            <span>{{auth()->user()->email}}</span>
                            <h4>{{auth()->user()->getRoleNames()->first()}}</h4>

                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalPicture" class="btn btn-sm btn-outline-dark">Update Picture</button>


                            <div class="modal fade" id="modalPicture">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Profile Picture</h5>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body pt-4">
                                                            @if(auth()->user()->profile)
                                                                <img width="100%" height="300px" src="{{asset('storage/profile')."/".auth()->user()->profile->picture}}" alt="">
                                                            @else
                                                                <h5 class="text-center">No Picture Uploaded</h5>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">

                                                    <form action="{{route('master-user-profile.update', [auth()->user()->id])}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-12 mb-3">
                                                                <input type="file" name="picture" class="form-control form-control-file @error('picture') is-invalid @enderror">
                                                                <x-validation name="picture"></x-validation>
                                                            </div>


                                                            <div class="col-12 mb-3">
                                                                <button class="btn btn-dark">Update Profile Picture</button>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">


                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                                </li>


                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-6">
                                            <div class="card p-4">
                                                <form action="{{route('profile.update', [auth()->user()->id])}}" method="post" >
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row gy-4">

                                                        <div class="col-md-6">
                                                            <x-form-floating name="name" type="text" value="{{auth()->user()->name}}" placeholder="Your Name">
                                                                <x-validation name="name"></x-validation>
                                                            </x-form-floating>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <x-form-floating name="username" type="text" value="{{auth()->user()->username}}" placeholder="Your Username">
                                                                <x-validation name="username"></x-validation>
                                                            </x-form-floating>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <x-form-floating name="email" type="text" value="{{auth()->user()-> email}}" placeholder="Your Email">
                                                                <x-validation name="email"></x-validation>
                                                            </x-form-floating>
                                                        </div>


                                                        <div class="col-md-12 text-center">
                                                            <button class="btn btn-primary" type="submit">Update Profile</button>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <div class="row">
                                        <div class="col-xl-12">


                                            <div class="card p-4">
                                                <form action="{{route('profile.update-password')}}" method="POST" >
                                                    @csrf
                                                    <div class="row gy-4">
                                                        <div class="col-md-12">
                                                            <x-form-floating name="current_password" type="password" placeholder="Current Password" value="{{old('current_password')}}">
                                                                <x-validation name="current_password"></x-validation>
                                                            </x-form-floating>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <x-form-floating name="password" type="password" placeholder="New Password" value="{{old('password')}}">
                                                                <x-validation name="password"></x-validation>
                                                            </x-form-floating>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <x-form-floating name="password_confirmation" type="password" placeholder="Confirm Password" value="{{old('password_confirmation')}}"></x-form-floating>
                                                        </div>

                                                        <div class="col-md-12 text-center">
                                                            <button class="btn btn-primary" type="submit">Update Password</button>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>




            </div>



            <div class="row gy-4">




            </div>
        </section>
    @endsection


    @section('script')
        <script>
            $(document).ready(function(){
                $("#table").DataTable();
            });
        </script>

    @endsection
</x-master>
