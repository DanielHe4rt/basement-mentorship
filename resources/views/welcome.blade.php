@extends('layout.app')


@section('content')
    @auth()
        {{ auth()->user()->github_username }}

        <x-task-list :tasks="$tasks" :userTasks="$userTasks"/>
    @endauth

@endsection
