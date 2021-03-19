@extends('layouts.app')
@section('content')
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
 </head>
 <body>
   
<div class="container my-3">
<h1>Lista de Produtos</h1><a class="btn btn-success" href="{{ url('/produto/create')}}" >Novo</a>
<hr class="my-4">
@if(!empty($produtos))
    <table class='table table-striped table-hover'>

    <thead class='bg-primary text-white'>
                <td>Nome</td>
                <td>Categoria</td>
                <td>Data de criação</td>   
                <td>Ações</td>   
    </thead>

          @foreach($produtos as $produto)
         
          {{-- {{ $linkNew = url('produto.create'. $produto->name)}};
          {{ $linkReadMore = url('produto.show'. $produto->id)}};
          {{ $linkEditItem = url('produto.edit'. $produto->name)}};--}}
          {{-- {{ $linkRemoveItem = url('produto/destroy'. $produto->id)}}; --}}

            <tr>
                <td>{{$produto->name}}</td>
                <td>{{$produto->category}}</td>
                <td>{{$produto->created_at}}</td> 
                <td><a href="{{route('produto.show', $produto->id)}}">Detalhes</a> | <a href="{{route('produto.edit', $produto->id)}}">Editar</a> | <a id="remover" class="remover" onclick="return confirm('Deseja excluir realmente esse produto?')" href="{{url('/produto/destroy/'.$produto->id)}}">Remover</a></td>  
            </tr>
          @endforeach
    </table>
@endif

{{-- <a class="btn btn-primary" href="{{produto.create}}"></a> --}}
</div>
@include('sweetalert::alert')

 </body>
 </html>   

@endsection