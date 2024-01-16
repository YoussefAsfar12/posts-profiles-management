
@props(['users'])
<div>
    <h1>Users</h1>
    <table border="1">
        <tr>
            <th>name</th>
            <th>email</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{$user["name"]}}</td>
                <td>{{$user["email"]}}</td>
            </tr>
        @endforeach
    </table>
</div>