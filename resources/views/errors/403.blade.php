@extends('errors::bab-errors-layout')

@section('title', __('Interdiction'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Vous n\'etes pas censé ous trouver la'))
