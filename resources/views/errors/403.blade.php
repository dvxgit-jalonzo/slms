<x-layout>
    @section('main')

        <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <h1 class=" text-dark">403</h1>
            <h2>You do not have permission to manage this module.</h2>
            <img style="width: 30%" src="{{asset('NiceAdmin/assets/img/diavox.jpg')}}" class="img-fluid py-5" alt="Page Not Found">
            <a class="btn btn-primary" href="{{route('master.index')}}">Back to dashboard</a>
        </section>
    @endsection
</x-layout>
