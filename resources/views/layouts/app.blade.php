<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Todo List') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

</head>

<body style="background:url('{{asset("img/background4.jpg")}}') no-repeat">
<div>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a> @else
                <a href="{{ route('login') }}">Login</a> @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a> @endif @endauth
        </div>
    @endif

    <div class="col-md-8 offset-2">

        @yield('content')

    </div>


</div>

<div class="card-footer">Designed & Developed By:<a href="#">Younes Mahmoud</a> </div>


</body>

</html>