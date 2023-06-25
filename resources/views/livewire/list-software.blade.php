<div>
    <h5 class="card-title">Softwares</h5>
    <table class="table table-borderless">
        <thead>
        <tr>
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($softwares as $software)
            <tr>
                <td>{{$software->code}}</td>
                <td>{{$software->name}}</td>
                <td>{{$software->description}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
