@extends('layouts.main')
@section('title', 'Accueil')
@section('content')
    <header class="max-width header">
        <div class="header-left">
            <h1 class="header-title">
                Book a book <span class="hidden">- Accueil</span>
            </h1>
            <nav class="header-nav">
                <h2 class="hidden">
                    Naviguation principale
                </h2>
                <ul class="header-menu">
                    <li class="header-menu-item">
                        <a href="#" class="header-menu-link">Livres</a>
                    </li>
                    <li class="header-menu-item">
                        <a href="#" class="header-menu-link">Panier</a>
                    </li>
                    <li class="header-menu-item">
                        <a href="#" class="header-menu-link">Commandes</a>
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
@endsection
