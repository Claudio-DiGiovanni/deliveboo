@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center">
    <form action="{{route('admin.dishes.store')}}" method="POST">

        @csrf

        <div class="mb-3">
        <label for="name" class="form-label">nome piatto</label>
        <input type="text" class="form-control" id="name" name="name">

        </div>

        <div class="mb-3">
        <label for="price" class="form-label">prezzo</label>
        <input type="number" class="form-control" id="price" name="price">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">url immagine</label>
            <input type="url" class="form-control" id="image" name="image">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">decrizione</label>
            <input type="text" class="form-control" id="description" name="description">

        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">slug</label>
            <input type="text" class="form-control" id="slug" name="slug">

        </div>

        <div class="mb-3 form-check">
        <input value="1" type="checkbox" class="form-check-input" id="visibility" name="visibility">
        <label class="form-check-label" for="visibility">visibilità</label>
        </div>

        <button type="submit" class="btn btn-primary btn-outline-success bg-success text-white">aggiungi piatto</button>


    </form>
</div>

@endsection
