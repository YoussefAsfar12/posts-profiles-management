
<x-master title="Edit Post" style="background-color: #fff;">

    <form action="{{ route('posts.update',$post->id) }}" method="post" enctype="multipart/form-data" style="margin-top: 20px;">
        @csrf
        @method("PUT")
        <label for="title" style="display: block; margin-bottom: 5px;">Title:</label>
        <input type="text" name="title" id="title" value="{{old('title',$post->title)}}"  style="width: 100%; padding: 8px; margin-bottom: 10px;">
        @error('title')
            <div style="color: red; margin-bottom: 12px;">{{ $message }}</div>
        @enderror
        <label for="content" style="display: block; margin-bottom: 5px;">Content:</label>
        <textarea name="content" id="content" rows="4"  style="width: 100%; padding: 8px; margin-bottom: 10px;">{{old('title',$post->content)}}</textarea>
        @error('content')
            <div style="color: red; margin-bottom: 12px;">{{ $message }}</div>
        @enderror
        <label for="image" style="display: block; margin-bottom: 5px;">Image:</label>
        <input type="file" name="image" id="image" accept="image/*"  style="margin-bottom: 10px;">

        <button type="submit" style="background-color: #4caf50; color: #fff; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">Submit</button>
    </form>

</x-master>
