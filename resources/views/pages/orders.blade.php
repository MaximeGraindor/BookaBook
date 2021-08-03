@extends('layouts.main')
@section('title', 'commandes')

@section('content')
    <div class="orders max-width">
        <h2 class="orders-title">
            Liste des commandes
        </h2>

        <div class="orders-wrapper">
            <div class="orders-filter">

            </div>
            <table>
                <thead>
                    <th>Numéro</th>
                    <th>Étudiant</th>
                    <th>Groupe</th>
                    <th>Montant</th>
                    <th>Status</th>
                    <th>Mise à jour</th>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->number}}</td>
                            <td>{{$order->user->name}} {{$order->user->firstname}}</td>
                            <td>{{$order->user->group}}</td>
                            <td>{{$order->amount}}€</td>
                            <td>{{$order->status[0]->name}}</td>
                            <td>{{$order->updated_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@endsection
