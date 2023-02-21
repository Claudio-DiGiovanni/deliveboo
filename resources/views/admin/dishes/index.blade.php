@extends('layouts.app');
@section('content')

    <h1>Lista piatti:</h1>
    <ol>
        @foreach ($dishes as $dish)
            <div class="row">
                <div class="col-5">
                    <span href="{{route('admin.dishes.show',['dish'=>$dish])}}">{{$dish->name}}</span>
                    <span>{{$dish->price/100}} €</span>
                </div>
                <div class="col-3">
                    <img class="w-25" src="{{$dish->image}}" alt="">
                </div>
                <div class="col-4">
                    <a href="{{ route('admin.dishes.show', ['dish' => $dish]) }}" class="btn btn-outline-info">Info</a>
                    {{-- <a href="{{ route('admin.dishes.edit', ['dish' => $dish]) }}" class="btn btn-outline-success">Modifica</a> --}}
                    {{-- <a class="btn btn-outline-danger">Elimina</a> --}}
                </div>
            </div>
        @endforeach
    </ol>

@endsection
