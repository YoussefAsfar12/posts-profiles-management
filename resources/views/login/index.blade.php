<x-master title="Login" style="text-align: center;">

    <form action="{{ route('login') }}" method="post" style="max-width: 400px; margin: 0 auto;">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{old("email")}}" style="width: 100%; padding: 8px; margin-bottom: 12px;">

        @error('email')
            <div style="color: red; margin-bottom: 12px;">{{ $message }}</div>
        @enderror

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" style="width: 100%; padding: 8px; margin-bottom: 12px;">


        <button type="submit" style="background-color: #4caf50; color: #fff; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;">Login</button>
    </form>

</x-master>
