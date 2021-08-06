@extends('layouts.main')
@section('title', 'Modifier son profil')

@section('content')
    <section class="profilUpdate max-width">
        <h2 class="profilUpdate-title">
            Modifier mon profil
        </h2>

        <form action="/profil/{{$user->slug}}/update" method="post" enctype="multipart/form-data">
            @csrf
            <div class="profilUpdate-picture">
                <label for="picture">Photo de profil</label>
                <input type="file" id="picture" name="picture">
                @error('picture')
                    <span>
                        {{$message}}
                    </span>
                @enderror
            </div>
            <div class="profilUpdate-firstname">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname">
            </div>
            <div class="profilUpdate-name">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="profilUpdate-email">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="profilUpdate-group">
                <label for="group">Group</label>
                <input type="text" id="group" name="group">
            </div>
            <div class="profilUpdate-submit">
                <input type="submit" value="Modifier">
            </div>
        </form>
    </section>
@endsection
