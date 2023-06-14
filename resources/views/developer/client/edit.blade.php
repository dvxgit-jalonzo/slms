<x-master>


    @section('style')
        <style>
            html,
            body {
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
            }
        </style>
    @endsection

    @section('pagetitle')
        <div class="pagetitle">
            <h1>Edit Client</h1>
            <nav>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('master.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('master-client.index')}}">View Client</a></li>
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
                            <form action="{{route('master-client.update', [$client->id])}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <x-form-floating name="code" type="text" class="text-uppercase" maxlength="3" placeholder="Code" value="{{$client->code}}">
                                            <x-validation name="code"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-form-floating name="company_name" type="text" placeholder="Company Name" value="{{$client->company_name}}">
                                            <x-validation name="company_name"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-form-floating name="description" type="text" placeholder="Description" value="{{$client->description}}">
                                            <x-validation name="description"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-form-floating name="email" type="text" placeholder="Email" value="{{$client->email}}">
                                            <x-validation name="email"></x-validation>email
                                        </x-form-floating>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <x-form-floating readonly name="latitude" type="text" value="{{$client->latitude}}" placeholder="Latitude">
                                            <x-validation name="latitude"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <x-form-floating readonly name="longitude" type="text" value="{{$client->longitude}}" placeholder="Longitude">
                                            <x-validation name="longitude"></x-validation>
                                        </x-form-floating>
                                    </div>



                                    <div class="col-12 mb-3">
                                        <x-form-floating name="location" type="text" placeholder="Location" value="{{$client->location}}">
                                            <x-validation name="location"></x-validation>
                                        </x-form-floating>
                                    </div>

                                    <div class="col-12 mb-3 ">
                                        <div class="float-end">
                                            <button class="btn btn-outline-primary">Update Client</button>
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

        @section('outmain')
            <div id="mymap"  style="height: 100% !important; width: 100% !important; position: relative !important;  margin-left: auto"></div>
        @endsection

        @section('script')
            <script>
                (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="ib",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
                    key: '{{env('GOOGLE_MAP_API_KEY')}}',
                    v: "weekly",
                });
            </script>
            <script>
                async function initMap() {

                    var lat = $("#latitude").val();
                    var long = $("#longitude").val();
                    var position;
                    var default_position = {lat: 14.606180, lng: 120.980471};

                    const { Map, event } = await google.maps.importLibrary("maps");

                     position =  (lat === "" || long === "") ? default_position : {lat: parseFloat(lat), lng: parseFloat(long)};

                    let map = new Map(document.getElementById("mymap"), {
                        zoom: 6,
                        center: position,
                        mapId: "DEMO_MAP_ID",
                    });

                    // Create a marker and add event listener
                    const marker = new google.maps.Marker({
                        position,
                        map,
                        draggable: true
                    });

                    // Add event listener for dragging the marker
                    marker.addListener("dragend", () => {
                        const newPosition = marker.getPosition();

                        document.getElementById("latitude").value = newPosition.lat().toFixed(6);
                        document.getElementById("longitude").value = newPosition.lng().toFixed(6);
                        // Get the address based on the new marker position
                        const geocoder = new google.maps.Geocoder();
                        geocoder.geocode({ location: newPosition }, (results, status) => {
                            if (status === "OK" && results[0]) {
                                document.getElementById("location").value = results[0].formatted_address;
                            }
                        });
                    });
                }

                initMap();
            </script>
        @endsection
</x-master>
