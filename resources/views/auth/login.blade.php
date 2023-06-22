<x-layout>
    @section('main')
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
{{--                                    <img src="{{asset('NiceAdmin/assets/img/logo.png')}}" alt="">--}}
                                    <img  src="{{asset('NiceAdmin/assets/img/diavox.jpg')}}" alt="">
                                    <span class="d-none d-lg-block">Software Licence Management</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <div class="row">


                                            <div class="col-12 text-center">
                                                @if(session('message'))
                                                    <div class="alert alert-dark" role="alert">
                                                        <h4 class="alert-heading">Warning !</h4><hr>
                                                        <p class="mb-0">{{ session('message') }}</p>
                                                    </div>
                                                @endif


                                                <img class="img-fluid" src="{{asset('NiceAdmin/assets/img/diavox.jpg')}}" alt="">
                                            </div>
                                            <div class="col-12">
                                                <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                            </div>
                                        </div>

{{--                                        <p class="text-center small">Enter your username & password to login</p>--}}
                                    </div>

                                    <form class="row g-3 needs-validation" action="{{route('login')}}" method="POST">
                                        @csrf
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Email or Username</label>
                                            <input id="email_or_username" type="text" class="form-control @error('email_or_username') is-invalid @enderror" name="email_or_username" value="{{ old('email_or_username') }}" required autocomplete="email_or_username" autofocus>
                                            @error('email_or_username')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>




                                        <div class="col-12">
                                            <button class="btn btn-dark w-100" type="submit">Login</button>
                                        </div>

                                        <div class="col-12 text-center  ">
                                            @if (Route::has('password.request'))
                                                <a class="btn text-info text-small fw-semibold" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->

                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    @endsection
</x-layout>




