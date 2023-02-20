@extends('layouts.app');
@section('content')

    <h1>Lista piatti:</h1>
    <ul>

      @foreach ($dishes as $dish)
        <li>{{$dish->name}}

            <ul>
                <li>{{$dish->price/100 }}€</li>
            </ul>

        </li>
      @endforeach

    </ul>

@endsection
