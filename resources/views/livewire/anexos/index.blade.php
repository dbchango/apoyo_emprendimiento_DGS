@extends('adminlte::page')

@section('title', 'Anexos')

@section('content_header')
    <h1>Anexos</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('anexos')
        </div>     
    </div>   
</div>
@endsection