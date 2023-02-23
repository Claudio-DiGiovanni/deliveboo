@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center container">
    <div class="card w-50">
        <img src="{{$dish->image}}" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">{{$dish->name}}</h5>
          <p class="card-text">{{$dish->description}}</p>
          <p class="card-text">Prezzo: {{$dish->price/100}} €</p>
          <a href="{{route('admin.dishes.index')}}" class="btn btn-primary">Torna ai piatti</a>
        </div>
      </div>
</div>

@endsection
