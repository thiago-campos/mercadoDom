@extends('layouts.app')
@section('content')

<div class="container my-3">
    <div class="jumbotron jumbotron-fluid">
        <h1 class="display-4">Detalhes</h1>
        <hr class="my-4">

        @if(!empty($produto))

                <h3 class="display-6">Nome:      {{$produto->name}} </h3>
                <p class="lead">Descrição:  {{$produto->description}} </p>
                <p class="lead">Categoria:  {{$produto->category}} </p>
                <p class="lead">Criado em:  {{$produto->created_at}} </p> 
        @endif
        <br>
       <a class="btn btn-primary" href="{{ url('/produto')}}" >Voltar</a>
    </div>
</div>
@endsection