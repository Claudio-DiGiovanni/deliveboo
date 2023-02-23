@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center">
    <form action="{{route('admin.dishes.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
        <label for="name" class="form-label">nome piatto</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" id="name" name="name">
                <div class="invalid-feedback">
                    @error('name')
                        <ul>
                            @foreach ($errors->get('name') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @enderror
                </div>

        </div>

        <div class="mb-3">
        <label for="price" class="form-label">prezzo</label>
        <input type="number" class="form-control  @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
        <div class="invalid-feedback">
            @error('price')
                <ul>
                    @foreach ($errors->get('price') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @enderror
        </div>
        </div>

        {{-- <div class="mb-3">
            <label for="image" class="form-label">url immagine</label>
            <input type="url" class="form-control  @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}">
            <div class="invalid-feedback">
                @error('image')
                    <ul>
                        @foreach ($errors->get('image') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div> --}}

        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
            <div class="invalid-feedback">
                @error('image')
                    <ul>
                        @foreach ($errors->get('image') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">decrizione</label>
            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}"> </textarea>
            <div class="invalid-feedback">
                @error('description')
                    <ul>
                        @foreach ($errors->get('description') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>

        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
            <div class="invalid-feedback">
                @error('slug')
                    <ul>
                        @foreach ($errors->get('slug') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>

        </div>

        <div class="mb-3 form-check">
        <input value="0" type="checkbox" class="form-check-input" id="visibility" name="visibility">
        <label class="form-check-label" for="visibility">visibilità</label>
        </div>

        <button type="submit" class="btn btn-outline-success bg-success text-white">aggiungi piatto</button>


    </form>
</div>

@endsection
