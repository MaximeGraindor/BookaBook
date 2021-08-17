@extends('layouts.main')
@section('title', $user->firstname . '' . $user->name)
@section('content')
    <div class="profil max-width">
        <div class="profil-breadcrumb">
            <span>Étudiant</span>
            <span>{{$user->firstname}} {{$user->name}}</span>
        </div>
        <h2 class="profil-title">
            Mon profil
        </h2>
        <div class="profil-content">
            <div class="profil-picture">
                <img src="{{ asset('/storage/users/' . $user->picture) }}" alt="Photo de profil">
            </div>
            <div class="profil-infos">
                <ul>
                    <li>
                        <span class="profil-infos-title">Prénom&nbsp;: </span>{{ $user->firstname }}
                    </li>
                    <li>
                        <span class="profil-infos-title">Nom&nbsp;: </span>{{ $user->name }}
                    </li>
                    <li>
                        <span class="profil-infos-title">Email&nbsp;: </span>{{$user->email}}
                    </li>
                    <li>
                        <span class="profil-infos-title">Groupe&nbsp;: </span>{{$user->group}}
                    </li>
                </ul>
                <div class="profil-update">
                    <a href="/profil/{{$user->slug}}/edit">Modifier mon profil</a>
                </div>
            </div>

        </div>

            <section class="profil-order">
                <h2 class="profil-order-title">
                    Commandes
                </h2>
                <table class="profil-order-table">
                    <thead>
                        <tr>
                            <td>Numéro de commande</td>
                            <td>Status</td>
                            <td>Montant</td>
                            <td>Date de commande</td>
                            <td>Modification du statut</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $user->orders as $order)
                            <tr>
                                <td>
                                    <a href="/profil/{{$user->slug}}/order/{{$order->number}}">{{ $order->number }}</a>
                                </td>
                                <td>
                                    <a href="/profil/{{$user->slug}}/order/{{$order->number}}">{{ $order->status[0]->name }}</a>
                                </td>
                                <td>
                                    <a href="/profil/{{$user->slug}}/order/{{$order->number}}">{{ $order->amount }}€</a>
                                </td>
                                <td>
                                    <a href="/profil/{{$user->slug}}/order/{{$order->number}}">{{ date('d/m/Y h:m', strtotime($order->created_at)) }}</a>
                                </td>
                                <td>
                                    <a href="/profil/{{$user->slug}}/order/{{$order->number}}">{{ date('d/m/Y h:m', strtotime($order->status[0]->updated_at)) }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
    </div>
@endsection
