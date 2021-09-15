@extends('adminlte::page')

@section('title', 'edit seller')

@section('content_header')
    <h1>minhas vendas</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4>Vendedor: <strong>{{$seller->name}}</strong></h4>
                <h5>Total de vendas: <strong class="text-info">{{$total}}</strong></h5>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
@stop
@section('js')
    <script src="{{asset('js/app.js')}}"></script>
@stop