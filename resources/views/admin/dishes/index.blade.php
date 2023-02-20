@extends('layouts.app');
@section('content')

    <h1>Lista piatti:</h1>
    <ol>
        @foreach ($dishes as $dish)
            <li> <a href="{{route('admin.dishes.show',['dish'=>$dish])}}">{{$dish->name}}</a>
                <ul>
                    <li>{{$dish->price/100}} €</li>
                    {{-- <li><img src="{{$dish->image}}" alt=""></li> --}}
                </ul>
            </li>
        @endforeach
    </ol>

@endsection
