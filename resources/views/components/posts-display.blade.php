<div class="post-container">
    @if (session()->has('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('profiles.show', $post->profile->id) }}" class="profile-link">
        <div class="profile-info">
            <img src="{{ asset('storage/' . $post->profile->image) }}" alt="{{ $post->profile->name }}">
            <span>{{ $post->profile->name }}</span>
        </div>
    </a>
    <h2>{{ $post->title }}</h2>
    <p class="date">Created at {{ $post->created_at->format('M d, Y') }}</p>
    <p class="content">{{ $post->content }}</p>
    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="post-image">
    @endif
    @can('edit', $post)
        <form method="get" action="{{ route('posts.edit', $post->id) }}" class="edit-button-form">
            @csrf
            <button type="submit" class="edit-button">Edit</button>
        </form>
    @endcan
    @can('delete', $post)
        <form method="post" action="{{ route('posts.destroy', $post->id) }}" onsubmit="return confirm('Are you sure?');" class="delete-button-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button">Delete</button>
        </form>
    @endcan
</div>
