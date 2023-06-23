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
                                                <img class="img-fluid" src="{{asset('NiceAdmin/assets/img/diavox.jpg')}}" alt="">
                                            </div>

                                        </div>
                                    </div>

                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf

                                        <div class="row mt-4 mb-3">
                                            <div class="col-12">
                                                <x-form-floating autofocus="on" name="email" placeholder="Email Address">
                                                    <x-validation name="email"></x-validation>
                                                </x-form-floating>
                                            </div>
                                        </div>

                                        <div class="row mb-0">

                                            <div class="col-12 mb-3 d-grid">
                                                <button type="submit" class="btn btn-outline-dark">
                                                    {{ __('Send Password Reset Link') }}
                                                </button>
                                            </div>
                                            <div class="col-12 mt-4 mb-3 text-center  ">

                                                    <a class="btn text-info text-small fw-semibold" href="{{ route('login') }}">
                                                        Return to login ?
                                                    </a>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    @endsection
</x-layout>








