@extends('adminlte::page')

@section('title', 'Organizaciones regulatorias')

@section('content_header')
    <h1>Organizaciones regulatorias</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('organizaciones-regulatorias')
        </div>
    </div>
</div>
@endsection
@livewireScripts