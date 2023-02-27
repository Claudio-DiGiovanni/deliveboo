@extends('layouts.app')

@section('content')
@auth
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Ciao capo, benvenuto nel tuo ristorante</h1>
           <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card h-100">
                      <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title text-center">Menù piatti</h5>
                        <img src="https://media-assets.lacucinaitaliana.it/photos/638e66dca4734137a7a3e238/16:9/w_1280,c_limit/spaghetti-spezzati-con-sugo-di-pesce1.jpg" class="card-img-top" alt="...">

                        <div class="row">
                          <a class="col-10 m-auto btn btn-outline-primary" href="{{ route('admin.dishes.index') }}">Entra </a>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="col-sm-6">
                  <div class="card ">
                    <div class="card-body d-flex flex-column justify-content-between">
                      <h5 class="card-title text-center">Lista ordini</h5>
                      <img src="https://media.istockphoto.com/id/1256489977/it/vettoriale/controllo-attivit%C3%A0-icona-blu-elenco-di-controllo.jpg?s=612x612&w=0&k=20&c=B0I-Kxb0l8l6pVA3Lqf3hRBK1dtFxIDr09483sxq7xY=" class="card-img-top" alt="...">

                      <div class="row">
                        <a class="col-10 m-auto btn btn-outline-primary" href="{{ route('admin.orders.index') }}">Entra</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
           </div>
        </div>
    </div>
</div>
@endauth

@endsection
