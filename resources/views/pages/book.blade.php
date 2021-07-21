@extends('layouts.main')
@section('title', $book->name)
@section('content')
    <div class="book max-width">
        <div class="book-breadcrumb">
            <a href="/books">Livres</a>
            <span>{{$book->name}}</span>
        </div>

        <section class="book-content">
            <div class="book-content-cover">
                <img src="{{ asset('/storage/books/' . $book->cover_path) }}" alt="Photo de couverture de{{$book->name}}">
            </div>
            <div class="book-content-infos">
                <h2 class="book-title">
                    {{ $book->name }}
                </h2>
                <dl>
                    <dt>ISBN&nbsp;:</dt>
                    <dd>{{$book->ISBN}}</dd>
                    <dt>Éditeur&nbsp;:</dt>
                    <dd>{{$book->publisher}}</dd>
                    <dt>Obligatoire&nbsp;:</dt>
                    <dd>{{$book->required ? 'oui' : 'non'}}</dd>
                </dl>
            </div>
        </section>
        <section class="book-random">
            <h2 class="book-random-title">Suggestions</h2>
            <div class="books-wrapper">
                @foreach ($randomBooks as $randomBook)
                    @if($randomBook->required === 1)
                    <div class="book-item">
                        <a href="{{$randomBook->slug}}" class="book-item-picture">
                            <img src="{{ asset('/storage/books/' . $randomBook->cover_path) }}" alt="Photo du livre">
                        </a>
                        <div class="book-item-info">
                            <span>Ajouter au panier</span>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </section>
    </div>
@endsection
