<nav style="background-color: #333; padding: 10px; text-align: center;">

    <a href="{{ route('home') }}" style="color: white; text-decoration: none; margin-right: 10px;">Home</a>

    @guest
        <a href="{{ route('login.index') }}" style="color: white; text-decoration: none; margin-right: 10px;">Login</a>
    @endguest

    <a href="{{ route('profiles.index') }}" style="color: white; text-decoration: none; margin-right: 10px;">Profiles</a>
    <a href="{{ route('profiles.create') }}" style="color: white; text-decoration: none; margin-right: 10px;">Create Profile</a>
    <a href="{{ route('settings.index') }}" style="color: white; text-decoration: none;">Settings</a>

    @auth
        <a href="{{ route('posts.create') }}" style="color: white; text-decoration: none;">Add Post</a>
        <a href="{{ route('logout') }}" style="color: white; text-decoration: none;">Logout</a>
        <span style="color: yellow; font-weight: bold; margin-left: 10px;">Welcome Mr.{{ auth()->user()->name }}</span>
    @endauth

</nav>
