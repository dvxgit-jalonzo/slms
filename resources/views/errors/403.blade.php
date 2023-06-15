<x-layout>
    @section('main')

        <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <h1>403</h1>
            <h2>You do not have permission to manage this module.</h2>
            <a class="btn" href="{{route('master.index')}}">Back to home</a>
            <img src="{{asset('NiceAdmin/assets/img/not-found.svg')}}" class="img-fluid py-5" alt="Page Not Found">

        </section>
    @endsection
</x-layout>
