<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book a Book - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body class="main-content">
    <header class="max-width header">
        <div class="header-left">
            <h1 class="header-title">
                Book a book <span class="hidden">- @yield('title')</span>
            </h1>
            <nav class="header-nav">
                <h2 class="hidden">
                    Naviguation principale
                </h2>
                <ul class="header-menu">
                    <li class="header-menu-item">
                        <a href="/books" class="header-menu-link {{ (request()->is('books')) ? 'active-header-menu' : '' }}">Livres</a>
                    </li>
                    <li class="header-menu-item">
                        <a href="/cart" class="header-menu-link">Panier</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="header-right">
            <div class="header-profil">
                <span class="header-profil-name">{{ Auth::user()->firstname }} {{ Auth::user()->name }}</span>
                <div class="header-profil-img">
                    <img src="./img/register-background.jpg" alt="">
                </div>
            </div>
        </div>
    </header>

    @yield('content')

</body>
</html>
