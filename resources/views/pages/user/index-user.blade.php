@extends('layouts.main')
@section('title', 'Étudiants')

@section('content')
    <div class="students max-width">
        <div class="students-top">
            <h2 class="students-title">
                Liste des étudiants
            </h2>
            <form action="#" method="get" class="students-form-filter">
                <div class="students-filter-search">
                    <label for="group" class="hidden">Groupe</label>
                    <select name="group" id="group">
                        @foreach ($usersGroup as $group)
                            <option value="{{$group}}">{{$group}}</option>
                        @endforeach
                        <option value=""></option>
                    </select>
                    <input type="submit" value="Filtrer">
                </div>
            </form>
        </div>

        <div class="students-wrapper">
            <div class="students-filter">

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
                                <input type="checkbox" name="students" id="" form="checkbox_form">
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
