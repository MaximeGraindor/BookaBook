@extends('layouts.auth')
@section('title', 'Changement de mot passe')
@section('content')
    <div class="resetPassword-wrapper">
        <h1 class="hidden" role="heading" aria-level="1">Book a Book - connexion</h1>
        <div class="resetPassword-right">
            <p class="resetPassword-intro">
                <span>Bienvenue sur</span> <span>Book a Book</span>
            </p>
            <p class="resetPassword-info">
                Ce site a été réalisé dans la cadre scolaire de la Haute Ecole de la province de Liège pour le cours de Typographie de Mr Spirlet.
            </p>
            <img src="/img/Logo_HEPL.png" alt="Logo de la Haute Ecole de la Province de Liège" class="resetPassword-logo-HEPL">
        </div>
        <section class="resetPassword-left">
            <div class="resetPassword-left-wrapper">
                <h2 class="resetPassword-title">Changer <span>son mot de passe</span></h2>
                <form action="{{ route('password.update') }}" method="post" class="resetPassword-form">
                    @csrf
                        <input type="hidden" name="token" value="{{ request()->route('token') }}">

                        <div class="resetPassword-form-email">
                            <label for="email">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="@if($errors->has('email'))resetPassword-input-error @endif"
                                value="{{ old('email')}}">
                            @error('email')
                                <span class="resetPassword-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="resetPassword-form-password">
                            <label for="password">Mot de passe</label>
                            <div class="password-action">
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="@if($errors->has('password'))resetPassword-input-error @endif"
                                    value="{{ old('password')}}">
                                <span class="password-action-showHide"></span>
                            </div>

                            @error('password')
                                <span class="resetPassword-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="register-form-password_confirmation">
                            <label for="password_confirmation">Confirmation du mot de passe</label>
                            <div class="password-action">
                                <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                class="@if($errors->has('password_confirmation'))register-input-error @endif"
                                value="{{ old('password_confirmation')}}">
                                <span class="password-action-showHide"></span>
                            </div>
                            @error('password_confirmation')
                                <span class="register-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="resetPassword-form-submit">
                            <input type="submit" id="submit" class="submit" name="submit" value="Modifer">
                        </div>
                </form>
            </div>
        </section>
    </div>
@endsection
