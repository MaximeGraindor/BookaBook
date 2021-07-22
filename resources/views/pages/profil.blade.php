@extends('layouts.main')
@section('title', $user->firstname . '' . $user->name)
@section('content')
    <div class="profil max-width">
        <p>
            Profil de {{$user->firstname . ' ' . $user->name}}
        </p>
    </div>
@endsection
