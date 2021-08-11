@extends('layouts.auth')
@section('title', 'Inscription')
@section('content')
    <div class="register-wrapper">
        <h1 class="hidden" role="heading" aria-level="1">Book a Book - Inscription</h1>
        <section class="register-left">
            <div class="register-left-wrapper">
                <h2 class="register-title">Inscription</h2>
                <form action="/register" method="post" class="register-form">
                    @csrf
                    <div class="register-form-firstname">
                        <label for="firstname">Prénom</label>
                        <input
                            type="text"
                            id="firstname"
                            name="firstname"
                            class="@if($errors->has('firstname'))register-input-error @endif"
                            value="{{ old('firstname') }}">
                        @error('firstname')
                            <span class="register-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="register-form-name">
                        <label for="name">Nom</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="@if($errors->has('name'))register-input-error @endif"
                            value="{{ old('name')}}">
                        @error('name')
                            <span class="register-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="register-form-email">
                        <label for="email">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="@if($errors->has('email'))register-input-error @endif"
                            value="{{ old('email')}}">
                        @error('email')
                            <span class="register-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="register-form-group">
                        <label for="group">Groupe</label>
                        <input
                            type="text"
                            id="group"
                            name="group"
                            class="@if($errors->has('group'))register-input-error @endif"
                            value="{{ old('group')}}">
                        @error('group')
                            <span class="register-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="register-form-password">
                        <label for="password">Mot de passe</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="@if($errors->has('password'))register-input-error @endif"
                            value="{{ old('password')}}">
                        @error('password')
                            <span class="register-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="register-form-password_confirmation">
                        <label for="password_confirmation">Confirmation du mot de passe</label>
                        <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="@if($errors->has('password_confirmation'))register-input-error @endif"
                        value="{{ old('password_confirmation')}}">
                        @error('password_confirmation')
                            <span class="register-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="register-form-submit">
                        <input type="submit" id="submit" class="submit" name="submit" value="S'inscrire">
                        <input type="hidden" name="picture" value="picture-default.png">
                    </div>
                </form>
            </div>
        </section>
        <div class="register-right">
            <p class="register-intro">
                <span>Bienvenue sur</span> <span>Book a Book</span>
            </p>
            <p class="register-info">
                Ce site a été réalisé dans la cadre scolaire de la Haute Ecole de la province de Liège pour le cours de Typographie de Mr Spirlet.
            </p>
            <img src="./img/Logo_HEPL.png" alt="Logo de la Haute Ecole de la Province de Liège" class="register-logo-HEPL">
        </div>
    </div>
@endsection
