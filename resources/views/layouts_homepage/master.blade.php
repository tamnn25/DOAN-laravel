<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | DOAN</title></head>
    @include('layouts_homepage.css')
<body>
    {{-- INCLUDE FILE HEADER --}}
          @include('layouts_homepage.header')
    {{-- END FILE HEADER --}}

        {{-- ---------------------------------------------------------------------- --}}

        <div class="container">
            @yield('content')
        </div>

        {{-- //-- ---------------------------------------------------------------------- --// --}}

    {{-- INCLUDE FILE FOOTER --}}
          @include('layouts_homepage.footer')
    {{-- END FILE FOOTER --}}

        {{-- ---------------------------------------------------------------------- --}}

    {{-- INCLUDE FILE JS --}}
          @include('layouts_homepage.js')
    {{-- END FILE JS --}}

        {{-- ---------------------------------------------------------------------- --}}


</body>
</html>