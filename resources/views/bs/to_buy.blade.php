@extends('layouts.app')
@section('title')
    comprar
@endsection
@section('content')
    <div class="container mx-auto">
        <div class="card">
            <div class="card-body px-5">
                {{-- @if (session('message'))
                    <div class="alert alert-success py-0"><span class="h3 font-weight-bold">{{session('message')}}</span></div>
                @endif --}}
                
                {{-- {!! Form::open(['route'=>'bs.bought', 'class'=>'d-flex flex-column form-group']) !!}

                {!! Form::text('number', null, ['class'=>'form-control mb-2', 'placeholder'=>'Numero']) !!}
                    @error('number')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                {!! Form::text('name', null, ['placeholder'=>'Insira seu nome', 'class'=>'form-control mb-2']) !!}
                    @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                {!! Form::text('cpf', null, ['placeholder'=>'Cpf: XXX.XXX.XXX-XX', 'class'=>'form-control mb-2']) !!}
                    @error('cpf')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                {!! Form::text('telephone', null, ['placeholder'=>'tel 99 99999 9999', 'class'=>'form-control mb-2']) !!}
                @error('telephone')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                {!! Form::text('pago', null, ['list'=>'ml', 'class'=>'form-control', 'placeholder'=>'por favor imforme se foi pago*']) !!}
                    <datalist id="ml">
                        <option value="no"></option>
                        <option value="yes"></option>
                    </datalist>

                {!! Form::label('seller', 'Vendedor/a :', ['class'=>'mt-2']) !!}
                
                {!! Form::text('seller', $seller->name, ['class'=>'form-control mb-2', 'readonly']) !!}
                
                {!! Form::submit('To Buy', ['class'=>'btn btn-outline-success font-bold']) !!}
               
                {!! Form::close() !!} --}}


                {{-- ------------------------------------------------------------------ --}}
                <div class="" id="message">
                    <strong id="strong"></strong>
                </div>
                
                <form action="" name="formtobuy">
                    @csrf
                    <input type="text" name="number" id="number" class="form-control mb-2" placeholder="Insira o Numero">
                        @error('number')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    <input type="text" name="name" id="name" class="form-control mb-2" placeholder="Insira Seu Nome">
                        @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    <input type="text" name="cpf" id="cpf" class="form-control mb-2" placeholder="Cpf: XXX.XXX.XXX-XX">
                        {{-- @error('cpf')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror --}}
                    <input type="text" name="telephone" id="telephone" class="form-control mb-2" placeholder="tel 99 99999 9999">
                        {{-- @error('telephone')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror --}}
                    <input type="text" name="pago" id="pago" list="ml" class="form-control mb-2" placeholder="imforme se foi pago">
                        <datalist id="ml">
                            <option value="no"></option>
                            <option value="yes"></option>
                        </datalist>
                    <label for="seller">Vendedor/a :</label>
                    <input type="text" name="seller" id="seller" value="{{$seller->name}}" class="form-control mb-2" readonly>
                    <br>
                    <button type="submit" class="btn btn-outline-success font-bold form-control">To Buy</button>
                </form>
            </div>
        </div>
    </div>
@endsection
