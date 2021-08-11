@extends('layouts.main')
@section('title', 'Livres')
@section('content')
    <section class="max-width editBook">
        <h2 class="editBook-title">
            Modifier {{$book->name}}
        </h2>

        <form action="/book/{{$book->slug}}/edit" method="post" class="editBook-form" enctype="multipart/form-data">
            @csrf
            <div class="editBook-picture">
                <img src="{{asset('/storage/books/' . $book->cover_path)}}" alt="Photo de couverture du livre">
                <label for="picture">Photo de couverture</label>
                <input type="file" id="picture" name="picture">
                @error('picture')
                    <span>
                        {{$message}}
                    </span>
                @enderror
            </div>
            <div class="editBook-right">
                <div class="editBook-name">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" placeholder="{{$book->name}}">
                    @error('name')
                        <span>
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="editBook-ISBN">
                    <label for="ISBN">ISBN</label>
                    <input type="email" id="ISBN" name="ISBN" placeholder="{{$book->ISBN}}">
                    @error('ISBN')
                        <span>
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="editBook-publisher">
                    <label for="publisher">Éditeur</label>
                    <select name="" id="">
                        @foreach ($publishers as $publisher)
                            <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="editBook-require">
                    <label for="require">Obligatoire ?</label>
                    <input type="radio" name="" id="">
                    <input type="radio" name="" id="">
                </div>
                <div class="editBook-detailsPublishing">
                    <label for="detailsPublishing">Détails d'édition</label>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="editBook-submit">
                    <input type="submit" value="Modifier">
                </div>
            </div>
        </form>

    </section>
@endsection
