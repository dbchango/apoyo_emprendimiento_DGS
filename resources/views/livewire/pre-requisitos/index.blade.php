
@extends('adminlte::page')

@section('title', 'Prerrequisitos')

@section('content_header')
    <h1>Prerrequisitos</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('pre-requisitos')
        </div>
    </div>
</div>
@endsection
