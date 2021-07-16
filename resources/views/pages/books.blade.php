@extends('layouts.main')
@section('title', 'Livres')
@section('content')
    <div class="max-width books">
        <section>
            <h2 class="books-title">
                Livres obligatoires
            </h2>
            <div class="books-wrapper">
                @foreach ($books as $book)
                    @if($book->required === 1)
                    <div class="book-item">
                        <a href="{{'books/' . $book->slug}}" class="book-item-picture">
                            <img src="{{ asset('/storage/books/' . $book->cover_path) }}" alt="Photo du livre">
                        </a>
                        <div class="book-item-info">
                            <span>Ajouter au panier</span>
                        </div>
                    </div>
                    @endif
                @endforeach
        </section>
        <section>
            <h2 class="books-title">
                Livres Facultatifs
            </h2>
            <div class="books-wrapper">
                @foreach ($books as $book)
                    @if($book->required === 0)
                    <div class="book-item">
                        <a href="{{'books/' . $book->slug}}" class="book-item-picture">
                            <img src="{{ asset('/storage/books/' . $book->cover_path) }}" alt="Photo du livre">
                        </a>
                        <div class="book-item-info">
                            <span>Titre du livre</span>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </section>
    </div>
@endsection
