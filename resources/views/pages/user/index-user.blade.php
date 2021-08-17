@extends('layouts.main')
@section('title', 'Étudiants')

@section('content')
    <div class="orders max-width">
        <div class="orders-top">
            <h2 class="orders-title">
                Liste des étudiants
            </h2>
        </div>

        <div class="orders-wrapper">
            <div class="orders-filter">

            </div>

            <form action="#" method="post" id="checkbox_form"></form>

            <table>
                <thead>
                    <th></th>
                    <th>Nom Prénom</th>
                    <th>Groupe</th>
                    <th>Email</th>
                    <th>Date de vérification</th>
                    <th>Mise à jour</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <input type="checkbox" name="orders" id="" form="checkbox_form">
                            </td>
                            <td>
                                <a href="profil/{{$user->slug}}">{{$user->name}} {{$user->firstname}}</a>
                            </td>
                            <td>
                                <a href="profil/{{$user->slug}}">{{$user->group}}</a>
                            </td>
                            <td>
                                <a href="profil/{{$user->slug}}">{{$user->email}}</a>
                            </td>
                            <td>
                                <a href="profil/{{$user->slug}}">{{$user->email_verified_at}}</a>
                            </td>
                            <td>
                                <a href="profil/{{$user->slug}}">{{$user->updated_at}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
