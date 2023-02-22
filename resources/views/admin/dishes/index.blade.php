@extends('layouts.app')
@section('content')

<div class="container">
    <div class="d-flex justify-content-center">
        <img src="{{$user->image_logo}}" alt="logo" class="img-fluid w-25  rounded ">
    </div>
    <div class="d-flex  justify-content-center">
        <h1 class="p-3 fw-bold ">I nostri piatti</h1>
    </div>

    <ol>
        @foreach ($dishes as $dish)
        <div class="d-flex m-4">
            <div class="col-3">
                <img class="w-75" src="{{$dish->image}}" alt="">
            </div>
            <div class="row m-4">
                <div class="col-5 d-flex align-items-center">
                    <span href="{{route('admin.dishes.show',['dish'=>$dish])}}">{{$dish->name}}</span>
                    <span>{{$dish->price/100}} €</span>
                </div>

                <div class="col-4 d-flex align-items-center">
                    <a href="{{ route('admin.dishes.show', ['dish' => $dish]) }}" class="btn btn-outline-info m-3  ">Info</a>
                    <a href="{{ route('admin.dishes.edit', ['dish' => $dish]) }}" class="btn btn-outline-success m-3  ">Modifica</a>
                    <form action="{{ route('admin.dishes.destroy', ['dish' => $dish]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-outline-danger m-3">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </ol>
    <h2 class="fw-bolder">Categorie:</h2>
    <ul>
        @foreach (($user->types) as $type)
            <li>{{$type->name}}</li>
        @endforeach
    </ul>
</div>


@endsection
