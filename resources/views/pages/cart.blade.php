@extends('layouts.main')
@section('title', 'Panier')
@section('content')
    <section class="cart max-width">
        <h2 class="cart-title">Votre panier</h2>
        <div class="cart-content">
            <div class="cart-list-item">
                @foreach ($draftOrder->books as $book)
                <div class="cart-item">
                    <div class="cart-item-left">
                        <a href="" class="cart-item-picture">
                            <img src="{{ asset('/storage/books/' . $book->cover_path) }}" alt="Photo du livre">
                        </a>
                    </div>
                    <div class="cart-item-right">
                        <div>
                            <p class="cart-item-title">{{$book->name}}</p>
                            <p class="cart-item-price">{{$book->student_price}}€</p>
                        </div>
                        <p class="cart-item-ISBN">ISBN&nbsp;: {{$book->ISBN}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="cart-total">
                <p class="cart-total-title">
                    Total du panier
                </p>
                <ul>
                    @foreach ($draftOrder->books as $book)
                        <li>1x{{Str::limit($book->name, $limit = 20, $end = '...')}}</li>

                    @endforeach
                </ul>
                <form action="#" method="post" class="cart-form">
                    <input type="submit" value="Passer commande" class="cart-form-submit">
                </form>
            </div>
        </div>

    </section>
@endsection
