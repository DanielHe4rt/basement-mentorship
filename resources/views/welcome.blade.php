@extends('layout.app')


@section('content')
    @auth()
        {{ auth()->user()->github_username }}
    @endauth

@endsection
