@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center">
    <ul>
        <li>
           {{$dish->name}}
        </li>
        <li>
         <img src="   {{$dish->image}}" alt="">
         </li>
         <li>
            {{$dish->price/100}} €
         </li>
         <li>
            {{$dish->description}}
         </li>
    </ul>
</div>

@endsection
