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
@endsection
