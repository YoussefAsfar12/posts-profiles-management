<x-master title="Profiles" style="text-align: center; padding: 20px;">

    <h1 style="font-size: 28px; margin-bottom: 20px;">User Profiles</h1>

    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <thead>
            <tr style="background-color: #f5f5f5;">
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">Image</th>
                <th style="padding: 10px;">Name</th>
                <th style="padding: 10px;">Email</th>
                <th style="padding: 10px;">Bio</th>
                <th style="padding: 10px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profiles as $profile)
                <tr>
                    <td style="padding: 10px;">{{ $profile->id }}</td>
                    <td style="padding: 10px;">
                        @if($profile->image)
                            <img src="{{ asset('storage/' . $profile->image) }}" alt="{{ $profile->name }}" width="50" style="border-radius: 50%;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td style="padding: 10px;">{{ $profile->name }}</td>
                    <td style="padding: 10px;">{{ $profile->email }}</td>
                    <td style="padding: 10px;">{{ Str::limit($profile->bio, 50) }}</td>
                    <td style="padding: 10px;">
                        <button style="background-color: #3490dc; color: #fff; padding: 5px 10px; border: none; border-radius: 4px; margin-right: 5px;"><a href="{{ route('profiles.show', $profile->id) }}" style="color: #fff; text-decoration: none;">Details</a></button>
                        <form method="post" action="{{route("profiles.destory",$profile->id)}}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: #e3342f; color: #fff; padding: 5px 10px; border: none; border-radius: 4px; margin-right: 5px;">Delete</button>
                        </form>
                        <form method="post" action="{{ route('profiles.edit', $profile->id) }}" style="display: inline-block;">
                            @csrf
                            @method('GET')
                            <button type="submit" style="background-color: #38c172; color: #fff; padding: 5px 10px; border: none; border-radius: 4px;">Edit</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $profiles->links() }}

</x-master>
