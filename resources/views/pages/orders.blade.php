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
                            <td>
                                <a href="profil/{{$order->user->slug}}/order/{{$order->number}}">{{$order->number}}</a>
                            </td>
                            <td>
                                <a href="profil/{{$order->user->slug}}/order/{{$order->number}}">{{$order->user->name}} {{$order->user->firstname}}</a>
                            </td>
                            <td>
                                <a href="profil/{{$order->user->slug}}/order/{{$order->number}}">{{$order->user->group}}</a>
                            </td>
                            <td>
                                <a href="profil/{{$order->user->slug}}/order/{{$order->number}}">{{$order->amount}}€</a>
                            </td>
                            <td>
                                <a href="profil/{{$order->user->slug}}/order/{{$order->number}}">{{$order->status[0]->name}}</a>
                            </td>
                            <td>
                                <a href="profil/{{$order->user->slug}}/order/{{$order->number}}">{{$order->updated_at}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$orders->links('utils.paginate')}}
        </div>
    </div>
@endsection
