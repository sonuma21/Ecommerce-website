<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">
</head>
<body>
    @include('sweetalert::alert')

    <header class="bg-primary">
        <x-frontend-navbar/>
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer></footer>
</body>
</html>
