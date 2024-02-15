@extends('layout.app')


@section('content')
    <x-module-list :modules="$modules" :userModules="$userModules"/>

@endsection
