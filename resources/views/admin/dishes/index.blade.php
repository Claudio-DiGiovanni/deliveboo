@extends('layouts.app')
@section('content')

<div class="container">
    <div class="d-flex justify-content-center">
        <img src="{{$user->image_logo}}" alt="logo" class="img-fluid w-25  rounded ">
    </div>
    <div class="d-flex  justify-content-center">
        <h1 class="p-3 fw-bold ">I nostri piatti</h1>
    </div>
    @if(count($dishes) > 0)
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
                    <button id="delete" class="btn btn-outline-danger" onclick="showPopup(event)" data-id="{{$dish->id}}">Elimina</button>
                            <div class="background">
                                <div class="popup">
                                    <h5 class="w-100 text-center mb-3">Sei sicuro di volerlo eliminare?</h5>
                                    <form action="{{ route('admin.dishes.destroy', ['dish' => $dish]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">Elimina</button>
                                    </form>
                                    <button class="btn btn-secondary" id="retry" onclick="hidePopup()">Annulla</button>
                                </div>
                            </div>
                </div>
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
