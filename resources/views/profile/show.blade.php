<x-master title="Profile" style="profile-show.css" >

    <div class="profile-container">
        <div class="profile-image">
            <img src="{{ asset('storage/' . $profile->image) }}" alt="{{ $profile->name }}" title="{{ $profile->name }}" width="120">
        </div>

        <div class="profile-details">
            <h1>{{ $profile->name }}</h1>
            <p class="join-date">Joined on {{ $profile->created_at->format('M d, Y') }}</p>
        </div>

        <div class="profile-bio">
            <p><strong>Email:</strong> {{ $profile->email }}</p>
            <p><strong>Bio:</strong> {{ $profile->bio }}</p>
        </div>
    </div>
    
    <hr />

    <h1>Posts</h1>
    
    @foreach ($profile->posts as $post)
        <x-profile-posts :post="$post" />
    @endforeach

</x-master>
