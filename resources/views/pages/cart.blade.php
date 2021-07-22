@extends('layouts.main')
@section('title', 'Panier')
@section('content')
    <section class="cart max-width">
        <h2 class="cart-title">Votre panier</h2>
        @if($draftOrder)
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
                    <ul class="cart-total-summary">
                        @foreach ($draftOrder->books as $book)
                            <li>
                                <span>1x</span>{{Str::limit($book->name, $limit = 20, $end = '...')}} <span>{{$book->student_price}}</span>
                            </li>
                        @endforeach
                    </ul>
                    <p>
                        {{ $draftOrder->amount }}€
                    </p>
                    <form action="/order/{{$draftOrder->id}}/status" method="post" class="cart-form">
                        @csrf
                        <input type="submit" value="Passer commande" class="cart-form-submit">
                        <input type="hidden" name="status" value="En attente">
                    </form>
                </div>
            </div>
        @else
            <p class="cart-noitem">
                Vous n'avez pas encore de livres dans votre panier. Parcourez la <a href="/books">liste</a> pour faire votre choix.
            </p>
        @endif

    </section>
@endsection
