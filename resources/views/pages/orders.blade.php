@extends('layouts.main')
@section('title', 'commandes')

@section('content')
    <div class="orders max-width">
        <div class="orders-top">
            <h2 class="orders-title">
                Liste des commandes
            </h2>
            <form action="#" method="get" class="orders-form-filter">
                <div class="orders-filter-search">
                    <label for="search" class="hidden">Rechercher</label>
                    <input type="search" id="search" name="search" placeholder="Numéro de commande">
                    <input type="submit" value="Filtrer">
                </div>
            </form>
        </div>

        <div class="orders-wrapper">
            <div class="orders-filter">

            </div>

            <form action="#" method="post" id="checkbox_form"></form>

            <table>
                <thead>
                    <th></th>
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
                            <td class="table-orders-checkbox">
                                <input type="checkbox" name="orders" id="" form="checkbox_form">
                            </td>
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
                                <form action="/order/{{$order->id}}/status" method="post">
                                    @csrf
                                    <label for="status" class="hidden">Changement de statut</label>
                                    <select name="status" id="status">
                                        @foreach ($statuses as $status)
                                            <option value="{{$status->id}}" {{$status->name === $order->last_status ? 'selected' : ''}}>{{$status->name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="submit" value="Modifier">
                                </form>
                            </td>
                            <td>
                                <a href="profil/{{$order->user->slug}}/order/{{$order->number}}">{{$order->status[0]->updated_at}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$orders->links('utils.paginate')}}
        </div>
    </div>
@endsection
