@extends('layouts.main')
@section('title', $book->name)
@section('content')

    {{-- @if(session('succes'))
        <div class="alert alert-succes">
            <p>{{session()->get( 'id' ) }}</p>
        </div>
    @endif --}}

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
                @can('isTeacher')
                    <a href="/books/{{$book->slug}}/edit" class="add-to-cart">Modifier le livre</a>
                @elsecan('isStudent')
                    <form action="/order/store" method="post">
                        @csrf
                        <button type="submit"  class="add-to-cart">Ajouter au panier</button>
                        <input type="hidden" name="bookId"  value="{{$book->id}}">
                    </form>
                @endcan
                <ul>
                    <li>
                        <span class="book-content-infos-title">ISBN&nbsp;: </span>{{$book->ISBN}}
                    </li>
                    <li>
                        <span class="book-content-infos-title">Auteur(s)&nbsp;: </span>
                        @foreach ( $book->authors as $author )
                            <span>{{ $author->name }}</span>
                        @endforeach
                    </li>
                    <li>
                        <span class="book-content-infos-title">Éditeur&nbsp;: </span>{{$book->publisher->name}}
                    </li>
                    <li>
                        <span class="book-content-infos-title">Prix publique&nbsp;: </span>{{$book->public_price}}€
                    </li>
                    <li>
                        <span class="book-content-infos-title">Prix d'étudiant&nbsp;: </span>{{$book->student_price}}€
                    </li>
                    <li>
                        <span class="book-content-infos-title">Obligatoire&nbsp;: </span>{{$book->required ? 'oui' : 'non'}}
                    </li>
                    <li>
                        <span class="book-content-infos-title">Détails d'édition&nbsp;: </span>{{$book->editing_details ? $book->editing_details : 'Pas d\'informations sur supplémentaire'}}
                    </li>
                </ul>
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
                            <form action="/order/store" method="post">
                                @csrf
                                <button type="submit">Ajouter</button>
                                <input type="hidden" name="bookId"  value="{{$randomBook->id}}">
                            </form>
                            <span>{{$randomBook->student_price}}€</span>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </section>
    </div>
@endsection
