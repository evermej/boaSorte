@extends('adminlte::page')

@section('title', 'edit role')

@section('content_header')
    <h1>edit role</h1>
@stop

@section('content')
    <div class="container">
        <a href="{{route('admin.roles.show', $role)}}" class="btn btn-outline-info btn-md my-1">view role</a>
        <div class="card">
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
                {!! Form::model($role, ['route'=> ['admin.roles.update', $role], 'method'=>'put']) !!}
                <div class="form-group">
                    {!! Form::text('name', $role->name, ['class'=>'form-control']) !!}
                </div>

                <h3>Lista de roles</h3>
                @foreach ($permissions as $permission)
                    <div>
                        <label>
                            {!! Form::checkbox('permissions[]', $permission->id, null) !!}
                            {{$permission->descripcion}}
                        </label>
                    </div>
                @endforeach
                {!! Form::submit('Actualizar role', ['class'=>'btn btn-success btn-lg']) !!}
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