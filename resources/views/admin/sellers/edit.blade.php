@extends('adminlte::page')

@section('title', 'edit seller')

@section('content_header')
    <h1>editar vendedor/a</h1>
@stop

@section('content')
    <div class="container">
        <a href="{{route('admin.sellers.show', $user->id)}}" class="btn btn-outline-info font-bold mb-2">
            ver funcionario
        </a>
        <div class="card">
            <div class="card-body">
                <p class="form-control"><strong>NAME : {{$user->name}}</strong></p>
                {!! Form::model($user, ['route'=>['admin.sellers.update',$user], 'method'=>'put']) !!}
                    {!! Form::text('name', $user->name, ['class'=>'form-control mb-2']) !!}
                    {!! Form::email('email', $user->email, ['class'=>'form-control mb-2']) !!}
                    {!! Form::password('password', ['class'=>'form-control mb-2']) !!}
                    <h3>roles</h3>
                    @foreach ($roles as $role)
                        <label class="mr-3">
                            {!! Form::checkbox('roles[]', $role->id, null) !!}
                            {{ $role->name }}
                        </label>
                    @endforeach
                    <hr>
                    {!! Form::submit('update seller', ['class'=>'btn btn-outline-info font-bold']) !!}
                {!! Form::close() !!}
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