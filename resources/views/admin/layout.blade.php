<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    @yield('cssAndJs')
</head>
<body class="">
Helllllllllllo
<div class="row">
    <div class="col-2 side_bar" style="height: 100vh">

        <div class="my-2">
            <img class="img-fluid w-50" src="{{asset('images/logo.png')}}">

            <h4 class="text-white mt-2">YEP</h4>
        </div>


        <hr style="color: #fff" />

        <div class="mx-4 text-start">

            <a href="{{route('dashboard.index')}}" >
                <div class="menu_item @if(request()->routeIs('dashboard.index')) menu_item_active @endif">
                    <i class="fa-solid fa-house mx-2"></i>
                     Home
                </div>
            </a>

            <a href="{{route('dashboard.posts.index')}}" >
                <div class="menu_item @if(request()->routeIs('dashboard.posts.*')) menu_item_active @endif">
                    <i class="fa-solid fa-house mx-2"></i>
                    Posts
                </div>
            </a>

            <a href="{{route('dashboard.authors.index')}}" >
                <div class="menu_item  @if(request()->routeIs('dashboard.authors.*')) menu_item_active @endif">
                    <i class="fa-solid fa-house mx-2"></i>
                    Authors
                </div>
            </a>
        </div>


    </div>

    <div class="col-10 p-0 m-0">

        <div class="w-100 bg-info" style="height: 40px;">

            <a href="{{ route('logout') }}">Log out</a>
        </div>

        <div class="p-2">
            @yield('main')
        </div>

    </div>
</div>


</body>
</html>
