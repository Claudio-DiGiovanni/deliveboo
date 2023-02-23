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

    <table class="table caption-top table-striped table-bordered">
        <thead>
          <tr class="table-success">
            <th scope="col">Nome Piatto</th>
            <th scope="col">Prezzo</th>
            <th scope="col">immagine</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($dishes as $dish)
          <tr>
            <td>{{$dish->name}}</td>
            <td>{{$dish->price/100}} €</td>
            <td class="w-25"><img class="img-fluid" src="{{$dish->image}}" alt=""></td>
            <th scope="row"><div class=" d-flex align-items-center">
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
            </div></th>
          </tr>
          @endforeach
        </tbody>
      </table>
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
