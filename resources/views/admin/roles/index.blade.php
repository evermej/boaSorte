@extends('adminlte::page')

@section('title', 'roles')

@section('content_header')
    <h1>roles</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <a href="{{route('admin.roles.create')}}" class="btn btn-outline-secondary px-3 font-bold mb-2 float-right">create role</a>
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)  
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td class="d-flex flex-row justify-content-end">
                                    <a href="{{route('admin.roles.show', $role)}}" class="btn btn-outline-secondary mx-1">ver</a>
                                    <a href="{{route('admin.roles.edit',$role)}}" class="btn btn-outline-info mx-1">edit</a>
                                    <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger">delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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