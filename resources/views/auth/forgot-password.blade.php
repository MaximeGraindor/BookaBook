@extends('layouts.auth')
@section('title', 'Mot de passe oublié')
@section('content')
    <div class="forgotPassword-wrapper">
        <h1 class="hidden" role="heading" aria-level="1">Book a Book - connexion</h1>
        <div class="forgotPassword-right">
            <p class="forgotPassword-intro">
                <span>Bienvenue sur</span> <span>Book a Book</span>
            </p>
            <p class="forgotPassword-info">
                Ce site a été réalisé dans la cadre scolaire de la Haute Ecole de la province de Liège pour le cours de Typographie de Mr Spirlet.
            </p>
            <img src="./img/Logo_HEPL.png" alt="Logo de la Haute Ecole de la Province de Liège" class="forgotPassword-logo-HEPL">
        </div>
        <section class="forgotPassword-left">
            <div class="forgotPassword-left-wrapper">
                <h2 class="forgotPassword-title">Réinitialiser <span>son mot de passe</span></h2>
                <form action="{{ route('passw   ord.email') }}" method="post" class="forgotPassword-form">
                    @csrf
                    <div class="forgotPassword-form-email">
                        <label for="email">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="@if($errors->has('email'))forgotPassword-input-error @endif"
                            value="{{ old('email')}}">
                        @error('email')
                            <span class="forgotPassword-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="forgotPassword-form-submit">
                        <input type="submit" id="submit" class="submit" name="submit" value="Se connecter">
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
