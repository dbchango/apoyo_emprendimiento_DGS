@extends('adminlte::page')

@section('title', 'Requisitos cumplidos')

@section('content_header')
    <h1>Requisitos cumplidos</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('requisito-cumplidos')
        </div>
    </div>
</div>
@endsection
