@extends('layout.app')


@section('content')
    @auth
        {{ auth()->user()->github_username }}

        <x-module-list :modules="$modules" :userModules="$userModules"/>
    @endauth

@endsection
