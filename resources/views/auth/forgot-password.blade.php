@extends('layouts.auth')
@section('title', 'Connexion')
@section('content')
    <div class="login-wrapper">
        <h1 class="hidden" role="heading" aria-level="1">Book a Book - connexion</h1>
        <div class="login-right">
            <p class="login-intro">
                <span>Bienvenue sur</span> <span>Book a Book</span>
            </p>
            <p class="login-info">
                Ce site a été réalisé dans la cadre scolaire de la Haute Ecole de la province de Liège pour le cours de Typographie de Mr Spirlet.
            </p>
            <img src="./img/Logo_HEPL.png" alt="Logo de la Haute Ecole de la Province de Liège" class="login-logo-HEPL">
        </div>
        <section class="login-left">
            <div class="login-left-wrapper">
                <h2 class="login-title">Réinitialiser <span>son mot de passe</span></h2>
                <form action="{{ route('password.email') }}" method="post" class="login-form">
                    @csrf
                    <div class="login-form-email">
                        <label for="email">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="@if($errors->has('email'))login-input-error @endif"
                            value="{{ old('email')}}">
                        @error('email')
                            <span class="login-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="login-form-submit">
                        <input type="submit" id="submit" class="submit" name="submit" value="Se connecter">
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
