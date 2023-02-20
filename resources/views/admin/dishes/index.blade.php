@extends('layouts.app');
@section('content')

    <h1>Lista piatti:</h1>
    <ul>
        @foreach ($dishes as $dish)
            <li>{{ $dish->name }} - {{ $dish->description }} ({{ $dish->price }}€)</li>
        @endforeach
    </ul>

@endsection
