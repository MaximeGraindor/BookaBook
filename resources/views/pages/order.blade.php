@extends('layouts.main')
@section('title', 'Commande n°' . $order->number)

@section('content')
    <section class="order max-width">
        <h2 class="order-title" role="heading" aria-level="2">
            Commande n°{{$order->number}} de {{$order->user->name}} {{$order->user->firstname}}
        </h2>
        <article class="order-status">
            <h3 class="order-status-title" role="heading" aria-level="3">
                Status de la commande
            </h3>
            <div class="order-status-wrapper">
                <div class="order-tracking completed">
                    <span class="is-complete"></span>
                    <p>Commandé<br><span>{{($order->is_ordered) ? date('d-m-Y', strtotime($order->is_ordered[0]['pivot']['created_at'])) : ''}}</span></p>
                </div>
                <div class="order-tracking {{($order->is_paid) ? 'completed' : 'false'}}">
                    <span class="is-complete"></span>
                    <p>Payé<br><span>{{($order->is_paid) ? date('d-m-Y', strtotime($order->is_paid[0]['pivot']['created_at'])) : ''}}</span></p>
                </div>
                <div class="order-tracking {{($order->is_available) ? 'completed' : 'false'}}">
                    <span class="is-complete"></span>
                    <p>Disponible<br><span>{{($order->is_available) ? date('d-m-Y', strtotime($order->is_available[0]['pivot']['created_at'])) : ''}}</span></p>
                </div>
                <div class="order-tracking {{($order->is_delivered) ? 'completed' : 'false'}}">
                    <span class="is-complete"></span>
                    <p>Livré<br><span>{{($order->is_delivered) ? date('d-m-Y', strtotime($order->is_delivered[0]['pivot']['created_at'])) : ''}}</span></p>
                </div>
            </div>
        </article>
        <article class="order-recap">
            <h3 class="order-recap-title" role="heading" aria-level="3">
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
