<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($emergency_dependant as $ed)
        <tr>
            <th scope="row">{{$ed->id}}</th>
            <td>{{$ed->name}}</td>
            <td>{{$ed->relationship}}</td>
            <td>@{{$ed->relationship_type}}</td>
            <td>@{{$ed->date_of_birth}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
