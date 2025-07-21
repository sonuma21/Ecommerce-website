<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @include('sweetalert::alert')
    <!-- Top Announcement Bar -->

    <header class="sticky top-0 z-50 bg-white shadow-md">
        <div class="flex items-center justify-between bg-pink-500 text-white ">
            <marquee behavior="" direction="" onmouseover="this.stop()" onmouseout="this.start()">
                <span class="marquee-item mx-8  gap-2">
                    <i class="fa-solid fa-bullhorn "></i>
                    Shop from multiple vendors with home delivery across Nepal!
                </span>
                <span class="marquee-item mx-8 gap-2">
                    <i class="fa-solid fa-store "></i>
                    Discover unique products from top sellers with exclusive offers!
                    <i class="fa-solid fa-heart"></i>
                </span>
                <a href="tel:9804322222"
                    class="marquee-item mx-8  gap-2 hover: transition-colors">
                    <i class="fa-solid fa-phone "></i>
                    Contact our support team for vendor inquiries: 9804322222
                </a>

            </marquee>
        </div>
        <x-frontend-navbar />
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer></footer>
</body>

</html>
