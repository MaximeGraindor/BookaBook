@extends('layouts.main')
@section('title', 'Commande n°' . $order->number)

@section('content')
    <section class="order max-width">
        <h2 class="order-title">
            Commande n°{{$order->number}} de {{$order->user->name}} {{$order->user->firstname}}
        </h2>
        <article class="order-status">
            <h3 class="order-status-title">
                Status de la commande
            </h3>
        </article>
        <article class="order-recap">
            <h3 class="order-recap-title">
                Récapitulatif de la commande&nbsp;- {{$order->amount}}€
            </h3>
            <div class="cart-list-item">
                @foreach ($order->books as $book)
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
                        <p>
                            Quantité&nbsp;: {{$book->pivot->quantity}}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </article>
    </section>
@endsection
