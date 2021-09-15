@extends('adminlte::page')

@section('title', 'edit seller')

@section('content_header')
    <h1>editar vendedor/a</h1>
@stop

@section('content')
    <div class="container">
        <a href="{{route('admin.sellers.edit', $user->id)}}" class="btn btn-outline-secondary font-bold my-2">
            edit funcionario/a
        </a>
        <div class="card">
            <div class="card-body">
                <h5>Name: <strong>{{$user->name}}</strong></h5>
                <h5>Email: <strong>{{$user->email}}</strong></h5>
                <h5>Role:</h5>
                <ul>
                    @foreach ($role as $role)
                        <li>
                            <strong>{{$role->name}}</strong>
                        </li>
                    @endforeach
                </ul>
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