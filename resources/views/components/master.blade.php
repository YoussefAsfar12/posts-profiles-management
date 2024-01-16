

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/'.$style) }}">
</head>
<body>
    @include('partials.nav')
<main>
    <div class="main">
    
        @if (session()->has('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        <div>
            {{ $slot }}
        </div>
    </div>

</main>
    @include('partials.footer')

</body>
</html>


    