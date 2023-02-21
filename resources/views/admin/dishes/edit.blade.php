@extends('layouts.app')
@section('content')
<form action="{{route('admin.dishes.update', ['dish' => $dish])}}" method="POST">
    @method('PUT')
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">nome piatto</label>
      <input type="text" class="form-control" id="name" name="name" value="{{old('name', $dish->name)}}">

    </div>

    <div class="mb-3">
      <label for="price" class="form-label">prezzo</label>
      <input type="number" class="form-control" id="price" name="price" value="{{old('price', $dish->price)}}">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">url immagine</label>
        <input type="url" class="form-control" id="image" name="image" value="{{old('image', $dish->image)}}">
      </div>

    <div class="mb-3">
        <label for="description" class="form-label">decrizione</label>
        <input type="text" class="form-control" id="description" name="description" value="{{old('description', $dish->description)}}">

    </div>

    <div class="mb-3">
        <label for="slug" class="form-label">slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug', $dish->slug)}}">

    </div>

    <div class="mb-3 form-check">
      <input value="1" type="checkbox" class="form-check-input" id="visibility" name="visibility">
      <label class="form-check-label" for="visibility">visibilità</label>
    </div>

    <button type="submit" class="btn btn-primary">Modifica piatto</button>


</form>
@endsection
