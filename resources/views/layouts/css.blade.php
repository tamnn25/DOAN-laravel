


{{-- /**
* define CSS file GLOBAL
* START
*/ --}}
<!-- Google Font -->

{{-- code nay de chay den file css ở thu muc public --}}
{{-- <base href="{{asset('')}}"> --}}
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
<!-- Css Styles -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('/plugins/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{'/shop/css/bootstrap.min.css'}}" type="text/css">
<link rel="stylesheet" href="{{ asset('/shop/css/font-awesome.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('/shop/css/elegant-icons.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('/shop/css/nice-select.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('/shop/css/jquery-ui.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('/shop/css/owl.carousel.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('/shop/css/slicknav.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('/shop/css/style.css') }}" type="text/css">


{{-- /**
* define CSS file GLOBAL
* END
*/ --}}


{{-- /**
* define CSS use INTERNAL (noi no o tung page)
* START (khai bao la css va qua moi page thi` dung @push('css'))
*/ --}}
{{-- all file css use global  --}}
<link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('/css/common.css') }}">

{{-- declare other file css --}}

@stack('css')
