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
            <img src="/img/Logo_HEPL.png" alt="Logo de la Haute Ecole de la Province de Liège" class="forgotPassword-logo-HEPL">
        </div>
        <section class="forgotPassword-left">
            <h2 role="heading" aria-level="2"  class="forgotPassword-title">
                Vérification d'email
            </h2>
            <p class="forgotPassword-verify">
                Vous devez être vérifié pour vous connecter
            </p>
            <form action="{{ route('verification.send') }}" method="post" class="forgotPassword-form">
                @csrf
                <div class="forgotPassword-form-submit">
                    <input type="submit" value="Renvoyer le mail">
                </div>
            </form>
        </section>
    </div>
@endsection
