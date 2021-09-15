@extends('adminlte::page')

@section('title', 'create role')

@section('content_header')
    <h1>criar um role</h1>
@stop

@section('content')
    <div class="container">
       <div class="card">
           <div class="card-body">
               @if (session('message'))
                   <div class="alert alert-success">
                       {{session('message')}}
                   </div>
               @endif
               {!! Form::open(['route'=>'admin.roles.store']) !!}
                    <div class="form-group">
                        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'role name...']) !!}
                    </div>
                    @error('name')
                        <div class="alert alert-warning">
                            <em>{{$message}}</em>
                        </div>
                    @enderror

                    <h3>Lista de permisos:</h3>
                    @foreach ($permissions as $permission)
                        <div>
                            <label>
                                {!! Form::checkbox('permissions[]', $permission->id, null) !!}
                                {{$permission->descripcion}}
                            </label>
                        </div>
                    @endforeach

                    {!! Form::submit('create role', ['class'=>'btn btn-success btn-lg']) !!}
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