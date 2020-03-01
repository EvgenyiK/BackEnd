<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('img/php.jpg')}}">
</head>
<body>

<nav id="navbar-example2" class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Главная</a>
    <ul class="nav nav-pills offset-3">
        <li class="navbar-brand">
            <a class="navbar-brand" href="{{route('post.create')}}">Создать пост</a>
        </li>
    </ul>

    <form class="form-inline my-2 my-lg-0" action="{{route('post.index')}}">
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Найти пост" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
    </form>

    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</nav>

<div class="container">
    @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{$error}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endforeach
    @endif
    @if(session('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
     </div>
    @endif
    @yield('content')
</div>

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
