@extends('layouts.app')
@section('title', 'ganhadores')
@section('content')
    <div class="container d-flex flex-column">
        @foreach ($winners as $winner)
            <div class="card my-1">
                <div class="card-body">
                    <h3>{{$winner->buyer->name}}</h3>
                    <p>Numero ganhador: <em class="text-danger">{{$winner->number}}</em></p>
                    <p>Date :<em class="text-danger">{{$winner->created_at}}</em></p>
                    <p>Vendedor: <em class="text-danger">{{$winner->user->name}}</em></p>
                </div>
            </div>
        @endforeach
    </div>
@endsection