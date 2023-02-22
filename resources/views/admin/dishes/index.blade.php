@extends('layouts.app')
@section('content')

<div class="container">
    <div class="d-flex">
        <h1>Lista piatti:</h1>
        <img src="{{$user->image_logo}}" alt="logo" class="img-fluid w-25">
    </div>
    @if(count($dishes) > 0)
    <ol>
        @foreach ($dishes as $dish)
            <div class="row">
                <div class="col-5">
                    <a href="{{route('admin.dishes.show',['dish'=>$dish])}}">{{$dish->name}}</a>
                    <span>{{$dish->price/100}} €</span>
                </div>
                <div class="col-3">
                    <img class="w-25" src="{{$dish->image}}" alt="">
                </div>
                <div class="col-4 d-flex ">
                    <a href="{{ route('admin.dishes.show', ['dish' => $dish]) }}" class="btn btn-outline-info">Info</a>
                    <a href="{{ route('admin.dishes.edit', ['dish' => $dish]) }}" class="btn btn-outline-success">Modifica</a>
                    <form action="{{ route('admin.dishes.destroy', ['dish' => $dish]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-outline-danger">Elimina</button>
                    </form>
                </div>
            </div>
        @endforeach
    </ol>
@else
    <p>No dishes found.</p>
@endif

    <h2>categorie:</h2>
    <ul>
        @foreach (($user->types) as $type)
            <li>{{$type->name}}</li>
        @endforeach
    </ul>
</div>


@endsection
