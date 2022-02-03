@extends('adminlte::page')
@section('title', 'Tipos de personas')

@section('content_header')
    <h1>Tipos de personas</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('tipo-de-personas')
        </div>
    </div>
</div>
@endsection
