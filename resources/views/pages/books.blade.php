@extends('layouts.main')
@section('title', 'Livres')
@section('content')
    <div class="max-width books">
        <section>
            <div class="books-top">
                <h2 class="books-title">
                    Livres obligatoires
                </h2>
                @can('isTeacher')
                    <a href="/books/add" class="books-add">Ajouter un livre</a>
                @endcan
            </div>
            <div class="books-wrapper">
                @foreach ($books as $book)
                    @if($book->required === 1)
                    <div class="book-item">
                        <a href="{{'books/' . $book->slug}}" class="book-item-picture">
                            <img src="{{ asset('/storage/books/' . $book->cover_path) }}" alt="Photo du livre">
                        </a>
                        <div class="book-item-info">
                            @can('isTeacher')
                            <a href="/books/{{$book->slug}}/edit">Modifier</a>
                            @elsecan('isStudent')
                            <form action="/order/store" method="post">
                                @csrf
                                <button type="submit">Ajouter</button>
                                <input type="hidden" name="bookId"  value="{{$book->id}}">
                            </form>
                            @endcan

                            <span>{{$book->student_price}}€</span>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
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
                                @can('isTeacher')
                                <a href="/books/{{$book->slug}}/edit">Modifier</a>
                                @elsecan('isStudent')
                                <form action="/order/store" method="post">
                                    @csrf
                                    <button type="submit">Ajouter</button>
                                    <input type="hidden" name="bookId"  value="{{$book->id}}">
                                </form>
                                @endcan
                                <span>{{$book->student_price}}€</span>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    </div>
@endsection
