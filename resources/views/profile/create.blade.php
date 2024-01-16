
<x-master title="create" style="text-align: center;">

    <form action="{{ route('profiles.store') }}" method="post" enctype="multipart/form-data" style="max-width: 400px; margin: 0 auto;">
        @csrf

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{old("name")}}" style="width: 100%; padding: 8px; margin-bottom: 12px;">

        @error('name')
            <div style="color: red; margin-bottom: 12px;">{{ $message }}</div>
        @enderror

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"  value="{{old("email")}}" style="width: 100%; padding: 8px; margin-bottom: 12px;">

        @error('email')
            <div style="color: red; margin-bottom: 12px;">{{ $message }}</div>
        @enderror

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" style="width: 100%; padding: 8px; margin-bottom: 12px;">

        @error('password')
            <div style="color: red; margin-bottom: 12px;">{{ $message }}</div>
        @enderror
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" style="width: 100%; padding: 8px; margin-bottom: 12px;">

        <label for="bio">Bio:</label>
        <textarea id="bio" name="bio" rows="4" style="width: 100%; padding: 8px; margin-bottom: 12px;">{{old("bio")}}</textarea>
        @error('bio')
        <div style="color: red; margin-bottom: 12px;">{{ $message }}</div>
        @enderror
    <label for="image">Image:</label>
    <input type="file" id="image" name="image" style="width: 100%; padding: 8px; margin-bottom: 12px;">
    @error('image')
        <div style="color: red; margin-bottom: 12px;">{{ $message }}</div>
        @enderror
        <button type="submit" style="background-color: #4caf50; color: #fff; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;">Register</button>
    </form>
</x-master>
