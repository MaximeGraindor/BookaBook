@extends('errors::bab-errors-layout')

@section('title', __('Problème serveur'))
@section('code', '500')
@section('message', __('Oups! il semblerait que quelque chose ce soit mal produit!'))
