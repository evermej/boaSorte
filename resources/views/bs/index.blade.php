@extends('layouts.app')
@section('title')
    home
@endsection
@section('content')
    
    <div class="container">
        <svg class="radial-progress" data-percentage="{{$porcentaje}}" viewBox="0 0 80 80">
            <circle class="incomplete" cx="40" cy="40" r="35"></circle>
            <circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 39.58406743523136;"></circle>
            <text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">{{$porcentaje}}%</text>
          </svg>
    </div>
@endsection