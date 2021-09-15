@extends('adminlte::page')

@section('title', 'sellers')

@section('content_header')
    <h1>Lista de vendedoras/es</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @can('admin.sellers.create')
                    <a href="{{route('admin.sellers.create')}}" class="btn btn-outline-info font-bold my-2 float-right">
                        cadastrar vendedor/a
                    </a>
                @endcan
                @if (session('message'))
                    <div class="alert alert-danger">
                        <strong><em>{{session('message')}}</em></strong>
                    </div>
                @endif
                <table class="table table-striped" id="tableUsers">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th colspan="3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                
                                <td class="d-flex flex-row justify-content-end">
                                    @can('admin.sellers.edit')
                                        <a href="{{route('admin.sellers.edit', $user)}}" class="btn btn-outline-secondary btn-sm font-bold">edit</a>
                                    @endcan
                                    <a href="{{route('admin.sellers.show', $user)}}" class="btn btn-outline-info btn-sm font-bold ml-2">ver</a>
                                    @can('admin.sellers.delete') 
                                        {!! Form::open(['route'=>['admin.sellers.destroy', $user], 'method'=>'delete']) !!}
                                            {!! Form::submit('delete', ['class'=>'btn btn-outline-danger btn-sm mx-2 font-bold']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- {{$users->links()}} --}}
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
@stop

@section('js')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableUsers').DataTable();
        });
    </script> --}}
@stop
{{-- https://www.youtube.com/watch?v=_ER7UT4w9WU --}}