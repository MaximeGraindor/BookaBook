@extends('errors::bab-errors-layout')

@section('title', __('Non autorisé'))
@section('code', '401')
@section('message', __('Vous n\etes pas autorisé à accéder à cette page'))
