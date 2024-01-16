

{{-- <x-master title="home">
    <h1>Welcome to the Home Page</h1>
    <x-users-table :users="$users" />
</x-master> --}}



<x-master title="home" style="posts-display.css">
    @foreach ($posts as $post)
   
    <x-posts-display  :post="$post"  />
    @endforeach
</x-master>
