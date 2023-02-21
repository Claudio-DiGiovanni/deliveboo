@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}

            <h1>Ciao capo, benvenuto nel tuo ristorante</h1>
<<<<<<< HEAD


=======
            {{-- <ul>
                @foreach (($user->types) ?? "" as $type)
                    <li>{{$type->name}}</li>
                @endforeach
            </ul> --}}
>>>>>>> ee98fd3f04bdb319bcd323c663cf3f1212153c31
        </div>
    </div>
</div>
@endsection
