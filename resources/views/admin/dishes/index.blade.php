@extends('layouts.app');
@section('content')

    <h1>Lista piatti:</h1>
<<<<<<< HEAD
    <ul>

      @foreach ($dishes as $dish)
        <li>{{$dish->name}}

            <ul>
                <li>{{$dish->price/100 }}€</li>
            </ul>

        </li>
      @endforeach

    </ul>
=======
    <ol>
        @foreach ($dishes as $dish)
            <li> {{$dish->name}}
                <ul>
                    <li>{{$dish->price/100}} €</li>
                    <li><img src="{{$dish->image}}" alt=""></li>
                </ul>
            </li>
        @endforeach
    </ol>
>>>>>>> 174a4fa13ce4d39f9bfed6bb0427d3fcd86eb090

@endsection
