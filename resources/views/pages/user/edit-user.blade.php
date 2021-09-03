@extends('layouts.main')
@section('title', 'Modifier son profil')

@section('content')
    <section class="profilUpdate max-width">
        <h2 class="profilUpdate-title" role="heading" aria-level="2">
            Modifier mon profil
        </h2>
            <div class="profilUpdate-wrapper">
                <div class="profilUpdate-preview-wrapper">
                    <img src="{{asset('/storage/users/' . $user->picture)}}" alt="Photo de profil" id="coverPreview">
                </div>
                <form action="/profil/{{$user->slug}}/update" method="post" class="profilUpdate-form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="profilUpdate-picture">
                        <label for="cover">Photo de profil</label>
                        <input type="file" id="cover" name="cover">
                        @error('cover')
                            <span>
                                {{$message}}
                            </span>
                        @enderror
                    </div>
                    <div class="profilUpdate-firstname">
                        <label for="firstname">Prénom</label>
                        <input type="text" id="firstname" name="firstname" placeholder="{{$user->firstname}}">
                        @error('firstname')
                            <span>
                                {{$message}}
                            </span>
                        @enderror
                    </div>
                    <div class="profilUpdate-name">
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name" placeholder="{{$user->name}}">
                        @error('name')
                            <span>
                                {{$message}}
                            </span>
                        @enderror
                    </div>
                    <div class="profilUpdate-email">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="{{$user->email}}">
                        @error('email')
                            <span>
                                {{$message}}
                            </span>
                        @enderror
                    </div>
                    <div class="profilUpdate-group">
                        <label for="group">Group</label>
                        <input type="text" id="group" name="group" placeholder="{{$user->group}}">
                        @error('group')
                            <span>
                                {{$message}}
                            </span>
                        @enderror
                    </div>
                    <div class="profilUpdate-submit">
                        <input type="submit" value="Modifier">
                    </div>
                </form>
            </div>
    </section>
    <section class="profilUpdate max-width">
        <h2 class="profilUpdate-title" role="heading" aria-level="2">
            Modifier mon mot de passe
        </h2>
        <form
            action="/profil/edit/password"
            method="post"
            class="profilUpdate-form-password"
            enctype="multipart/form-data"
            >
                @csrf
                <div class="update-form-wrapper">
                    <label for="current_password">Mot de passe actuel</label>
                    <div class="password-wrapper-show">
                        <input type="password" id="current_password" name="current_password" accept=".png,.jpg,.jpeg" >
                        <span class="password-action"></span>
                    </div>
                    @error('current_password')
                        <span>
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="update-form-wrapper">
                    <label for="new_password">Nouveau mot de passe</label>
                    <div class="password-wrapper-show">
                        <input type="password" id="new_password" name="new_password">
                        <span class="password-action"></span>
                    </div>
                    @error('new_password')
                        <span>
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="update-form-wrapper">
                    <label for="new_confirm_password">Confirmation du nouveau mot de passe</label>
                    <div class="password-wrapper-show">
                        <input type="password" id="new_confirm_password" name="new_confirm_password">
                        <span class="password-action"></span>
                    </div>
                    @error('new_confirm_password')
                        <span>
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="update-form-wrapper">
                    <input type="submit" value="Changer de mot de passe">
                </div>
            </form>
    </section>
@endsection
