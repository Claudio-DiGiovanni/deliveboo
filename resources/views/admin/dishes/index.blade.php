@extends('layouts.app');
@section('content')

    <h1>Lista piatti:</h1>
    <ol>
        @foreach ($dishes as $dish)
            <li> {{$dish->name}}
                <ul>
                    <li>{{$dish->price/100}} €</li>
                    {{-- <li><img src="{{$dish->image}}" alt=""></li> --}}
                </ul>
            </li>
        @endforeach
    </ol>

@endsection
