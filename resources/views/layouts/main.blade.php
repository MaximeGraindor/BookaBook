<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book a Book - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <meta name="description" content="Book a Book est un site réalisé dans la cadre scolaire de la Haute Ecole de la province de Liège pour le cours de Typographie de Mr Spirlet." >
    @livewireStyles
    @toastr_css
</head>
<body class="main-content">
    <header class="max-width header">
        <div class="header-left">
            <h1 class="header-title">
                <a href="/books">Book a book <span class="hidden">- @yield('title')</span></a>
            </h1>
            <nav class="header-nav">
                <h2 class="hidden">
                    Naviguation principale
                </h2>
                <ul class="header-menu">
                    <span class="responsiveMenu-close"></span>
                    <li class="header-menu-item">
                        <a href="/books" class="header-menu-link {{ (request()->is('books')) ? 'active-header-menu' : '' }}">Livres</a>
                    </li>
                    @can('isTeacher')
                        <li class="header-menu-item">
                            <a href="/students" class="header-menu-link {{ (request()->is('students')) ? 'active-header-menu' : '' }}">Étudiant</a>
                        </li>
                        <li class="header-menu-item">
                            <a href="/orders" class="header-menu-link {{ (request()->is('orders')) ? 'active-header-menu' : '' }}">Commandes</a>
                        </li>
                    @elsecan('isStudent')
                        <li class="header-menu-item">
                            <a href="/cart" class="header-menu-link {{ (request()->is('cart')) ? 'active-header-menu' : '' }}">Panier</a>
                        </li>
                    @endcan
                </ul>
            </nav>
        </div>
        <div class="header-right">
            <a href="/profil/{{Auth::user()->slug}}" class="header-profil">
                <span class="header-profil-name">{{ Auth::user()->firstname }} {{ Auth::user()->name }}</span>
                <div class="header-profil-img">
                    <img src="{{ asset('/storage/users/' . Auth::user()->picture) }}" alt="Photo de profil">
                </div>
            </a>
        </div>
        <div class="header-responsiveMenu">
            <img src="/img/menu.svg" alt="Photo de profil">
        </div>
    </header>

    @yield('content')

    <script src="{{ asset('/js/app.js') }}"></script>
    @livewireScripts
    @jquery
    @toastr_js
    @toastr_render
    <script>
        window.livewire.on('alert', param => {
            toastr.success(param['message'], param['type']);
            console.log('génial');
        })
    </script>
</body>
</html>
