@extends('layouts.main')
@section('title', 'Ajouter un livre')

@section('content')

    <section class="createBook max-width">
        <h2 class="createBook-title">
            {{$book->exists ? 'Modifier ' . $book->name: 'Ajouter un livre'}}
        </h2>
        <div class="createBook-wrapper">
            <div class="createBook-preview-wrapper">
                <img src="{{$book->cover_path ? asset('/storage/books/' . $book->cover_path) : '/img/preview-book.jpg'}}" alt="Photo de prévisualisation" id="coverPreview">
            </div>
            <form action="{{$book->exists ? '/books/'.$book->slug.'/update' : '/books/store'}}"  method="POST" class="createBook-form" enctype="multipart/form-data">
                @csrf
                @if ($book->exists)
                    @method('PUT')
                @endif
                <div class="createBook-form-cover">
                    <label for="cover">Photo de couverture</label>
                    <input type="file" id="cover" name="cover">
                    @error('cover')
                        <span class="createBook-form-error">{{$message}}</span>
                    @enderror
                </div>
                <div class="createBook-form-title">
                    <label for="title">Titre du livre</label>
                    <input type="text" id="title" name="title" value="{{old('title')}}" placeholder="{{$book->name}}">
                    @error('title')
                        <span class="createBook-form-error">{{$message}}</span>
                    @enderror
                </div>
                <div class="createBook-form-isbn">
                    <label for="isbn">ISBN</label>
                    <input type="text" id="isbn" name="isbn" value="{{old('isbn')}}" placeholder="{{$book->ISBN}}">
                    @error('isbn')
                        <span class="createBook-form-error">{{$message}}</span>
                    @enderror
                </div>
                <div class="createBook-form-required">
                    <span>Obligatoire ?</span>
                    <div class="required-wrapper">
                        <label for="yes">
                            <input type="radio" name="required" id="yes" value="oui" {{$book->required ? 'checked' : ''}}>
                            Oui
                        </label>
                        <label for="no">
                            <input type="radio" name="required" id="no" value="non" {{$book->required ? '' : 'checked'}}>
                            Non
                        </label>
                    </div>
                    @error('required')
                        <span class="createBook-form-error">{{$message}}</span>
                    @enderror
                </div>
                <div class="createBook-form-publicPrice">
                    <label for="publicPrice">Prix publique</label>
                    <input type="text" id="publicPrice" name="publicPrice"  value="{{old('publicPrice')}}" placeholder="{{$book->public_price}}">
                    @error('publicPrice')
                        <span class="createBook-form-error">{{$message}}</span>
                    @enderror
                </div>
                <div class="createBook-form-studentPrice">
                    <label for="studentPrice">Prix étudiant</label>
                    <input type="text" id="studentPrice" name="studentPrice" value="{{old('studentPrice')}}" placeholder="{{$book->student_price}}">
                    @error('studentPrice')
                        <span class="createBook-form-error">{{$message}}</span>
                    @enderror
                </div>
                <div class="createBook-form-publisher">
                    <label for="publisher">Éditeur</label>
                    <select name="publisher" id="publisher">
                        <option value="">Sélectionnez un éditeur</option>
                        @foreach ($publishers as $publisher)
                            <option value="{{$publisher->id}}" {{$book->publisher_id === $publisher->id ? 'selected' : ''}}>{{$publisher->name}}</option>
                        @endforeach
                    </select>
                    @error('publisher')
                        <span class="createBook-form-error">{{$message}}</span>
                    @enderror
                </div>
                <div class="createBook-form-authors">
                    <label for="author">Auteurs</label>
                    <div class="multiselect-wrapper">
                        <div class="selectbox">
                            <select id="author">
                                <option value="">Sélectionnez vos catégories de produits</option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div class="checkboxes">
                            @foreach ($authors as $author)
                                @if(($book->authors)->count())
                                    @foreach ($book->authors as $bookAuthor)
                                        <label for="{{ $author->name }}">
                                            <input type="checkbox" id="{{ $author->id }}" value="{{ $author->name }}" name="authors[]" {{$bookAuthor->id === $author->id ? 'checked' : ''}}/>
                                            {{ $author->name }}
                                        </label>
                                    @endforeach
                                @else
                                    <label for="{{ $author->name }}">
                                        <input type="checkbox" id="{{ $author->id }}" value="{{ $author->name }}" name="authors[]"/>
                                        {{ $author->name }}
                                    </label>
                                @endif
                            @endforeach
                            @error('authors')
                                <span class="createBook-form-error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="createBook-form-publishingDetails">
                    <label for="publishingDetails">Détails d'édition</label>
                    <textarea name="publishingDetails" id="publishingDetails" cols="30" rows="10" placeholder="{{$book->editing_details}}"></textarea>
                    @error('publishingDetails')
                        <span class="createBook-form-error">{{$message}}</span>
                    @enderror
                </div>
                <div class="createBook-form-submit">
                    <input type="submit" value="Envoyer">
                </div>
            </form>
        </div>
    </section>
@endsection
