@extends('adminlte::page')
@section('title', 'Requisitos')

@section('content_header')
    <h1>Requisitos</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('requisitos')
        </div>
    </div>
</div>
@endsection
@livewireScripts
