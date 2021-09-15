@extends('adminlte::page')

@section('title', 'roles')

@section('content_header')
    <h1>roles</h1>
@stop

@section('content')
    <div class="container">
        <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-outline-info btn-md my-1">edit role</a>
        <div class="card">
            <div class="card-body">
                <h4>Role: <em class="text-danger">{{$role->name}}</em></h4>
                <hr>
                <h5>Role Permissions:</h5>
                <ul>
                    @foreach ($role->permissions as $permission)
                        <div>
                            <li>
                                <strong>{{$permission->descripcion}}</strong>
                            </li>
                        </div>
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