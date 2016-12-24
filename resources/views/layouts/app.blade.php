<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Банк</title>

    <meta name="author" content="JADJER">

    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    @yield('style')
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button> <a class="navbar-brand" href="{{ url('/') }}">Регистрация заявок на инкасацию обьектов</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::user())
                            @if (!Auth::guest() && Auth::user()->isAdmin)
                                <li>
                                    <a href="{{ url('/') }}" role="button" class="btn">Управление заявками</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ url('/order/create') }}" role="button" class="btn">Оставить заявку</a>
                                </li>
                            @endif
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Привет, {{Auth::user()->name}} <strong class="caret"></strong></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ url('/orders') }}">Мои заявки</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/profile') }}">Мой профиль</a>
                                        </li>
                                        <li class="divider">

                                        </li>
                                        <li>
                                            <a href="{{ url('/logout') }}">Выйти</a>
                                        </li>
                                    </ul>
                                </li>
                        @elseif (Auth::guest())
                            <li>
                                <a href="{{ url('/login') }}" role="button" class="btn">Вход</a>
                            </li>
                            <li>
                                <a href="{{ url('register') }}" role="button" class="btn">Регистрация</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
</div>
@yield('script')
</body>
</html>