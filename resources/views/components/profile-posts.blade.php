<div style="border: 1px solid #ddd; padding: 10px; margin-bottom: 15px; border-radius: 6px; max-width: 100%; background-color: #fff;">
    <h2 style="color: #333; margin-bottom: 5px;">{{ $post->title }}</h2>
    <p style="font-size: 14px; color: #777; margin-bottom: 15px;">Created at {{ $post->created_at->format('M d, Y') }}</p>

    <p style="color: #666; margin-bottom: 10px;">{{ $post->content }}</p>
    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" style="max-width: 100%; border-radius: 6px;">
    @endif
    
    @auth
        @if (auth()->user()->id === $post->profile_id)
            <form method="get" action="{{ route('posts.edit', $post->id) }}" style="display: inline-block; margin-right: 10px;">
                @csrf
                <button type="submit" style="background-color: #3490dc; color: #fff; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer;">Edit</button>
            </form>
            <form method="post" action="{{ route('posts.destroy', $post->id) }}" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" style="background-color: #e3342f; color: #fff; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer;">Delete</button>
            </form>
        @endif
    @endauth
</div>
