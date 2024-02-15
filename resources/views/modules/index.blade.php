@extends('layout.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
        <li class="breadcrumb-item active">Mentorias</li>
    </ol>
@endsection

@section('content')
    <x-module-list :modules="$modules" :userModules="$userModules"/>

@endsection
