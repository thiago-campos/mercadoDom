@extends('layouts.app')
@section('content')
    
<div class="container my-3">
<h1>Lista de Produtos</h1><a class="btn btn-success" href="{{ url('/produto/create')}}" >Novo</a>

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
          {{ $linkEditItem = url('produto.edit'. $produto->name)}};
          {{ $linkRemoveItem = url('produto.destroy'. $produto->name)}}; --}}

            <tr>
                <td>{{$produto->name}}</td>
                <td>{{$produto->category}}</td>
                <td>{{$produto->created_at}}</td> 
                <td><a href="{{route('produto.edit', $produto->id)}}">Editar</a> | <a href="{{url('/produto/destroy')}}">Remover</a></td>  
            </tr>
          @endforeach
    </table>
@endif

{{-- <a class="btn btn-primary" href="{{produto.create}}"></a> --}}
</div>
@endsection