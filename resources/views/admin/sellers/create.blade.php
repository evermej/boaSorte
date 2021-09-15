@extends('adminlte::page')

@section('title', 'create')

@section('content_header')
    <h1>Cadastrar novo vendedor/ra</h1>
@stop

@section('content')
   <div class="container">
       <div class="card">
           <div class="card-body">
               {!! Form::open(['route'=>'admin.sellers.store']) !!}
                    <div class="form-group">
                        {!! Form::text('name', null, ['class'=>'form-control mb-2', 'placeholder'=>'your name']) !!}
                        @error('name')
                            <div class="alert alert-warning py-1"><strong><em>{{$message}}</em></strong></div>
                        @enderror
                        {!! Form::email('email', null, ['class'=>'form-control mb-2', 'placeholder'=>'email']) !!}
                        @error('email')
                            <div class="alert alert-warning py-1"><strong><em>{{$message}}</em></strong></div>
                        @enderror
                        {!! Form::password('password', ['class'=>'form-control mb-2', 'placeholder'=>'enter your password']) !!}
                        @error('password')
                            <div class="alert alert-warning py-1"><strong><em>{{$message}}</em></strong></div>
                        @enderror
                        {!! Form::submit('create seller', ['class'=>'btn btn-outline-success form-control font-bold']) !!}
                    </div>
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