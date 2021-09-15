@extends('layouts.app')
@section('title')
    comprar
@endsection
@section('content')
    <div class="container mx-auto">
        <div class="card">
            <div class="card-body px-5">
                @if (session('message'))
                    <div class="alert alert-success py-0"><span class="h3 font-weight-bold">{{session('message')}}</span></div>
                @endif
                
                {!! Form::open(['route'=>'bs.bought', 'class'=>'d-flex flex-column form-group']) !!}

                {!! Form::number('number', null, ['class'=>'form-control mb-2', 'placeholder'=>'Numero']) !!}
                    @error('number')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                {!! Form::text('name', null, ['placeholder'=>'Enter Your Name', 'class'=>'form-control mb-2']) !!}
                    @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                {!! Form::text('cpf', null, ['placeholder'=>'Cpf: XXX.XXX.XXX-XX', 'class'=>'form-control mb-2']) !!}
                    @error('cpf')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                {!! Form::text('telephone', null, ['placeholder'=>'tel 99 99999 9999', 'class'=>'form-control mb-2']) !!}
                {{-- <input type="tel" name="telephone" placeholder="tel: 99-99999-9999" pattern="[0-9]{2}-[0-9]{5}-[0-9]{4}" class="form-control mb-2"> --}}
                    @error('telephone')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                {!! Form::text('pago', null, ['list'=>'ml', 'class'=>'form-control', 'placeholder'=>'por favor imforme se foi pago*']) !!}
                    <datalist id="ml">
                        <option value="no"></option>
                        <option value="yes"></option>
                    </datalist>

                {!! Form::label('seller', 'Vendedor/a :', ['class'=>'mt-2']) !!}
                {{-- {!! Form::select('seller', $sellers, null, ['class'=>'form-control mb-2']) !!} --}}
                {!! Form::text('seller', $seller->name, ['class'=>'form-control mb-2', 'readonly']) !!}
                
                {!! Form::submit('To Buy', ['class'=>'btn btn-outline-success font-bold']) !!}
                {{-- <button class="border-2 border-green-600 hover:bg-green-600 hover:text-white font-bold py-1 rounded-md mt-3 w-full sm:w-1/2 md:w-1/3" type="submit">To Buy</button> --}}
                
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
