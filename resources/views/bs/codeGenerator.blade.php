@extends('layouts.app')
@section('title')
    comprar
@endsection
@section('content')
    <div class="container mx-auto">
        <div class="card">
            <div class="card-body px-5 d-flex flex-column justify-content-center">
                <div>
                    {!! QrCode::size(250)->generate($payloadQrCode); !!}
                    {{-- no me funciona --}}
                </div>
                <br>
                <p>{{$payloadQrCode}}</p>
            </div>
        </div>
    </div>
@endsection
