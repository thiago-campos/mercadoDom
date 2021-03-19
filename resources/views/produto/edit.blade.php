@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <div class="container">
        <h1>Editar Produto</h1>

        <form action="{{ route('produto.update', $produto->id)}}" class="form-group" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" value="{{$produto->name}}" name="name" id="name" class="form-control">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="description">Descrição:</label>
                <input type="text" value="{{$produto->description}}" name="description" id="description" class="form-control">
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>

@if (!empty($categories)) 
        <div class='form-group'>
            <select class='form-select' name="category" id="category"  aria-label='Default select example'>
            <option selected>Selecione a Categoria</option>
    @foreach ($categories as $categ)
                <option value='{{$categ->id}}' {{$produto->category === $categ->id ? 'selected' : ''}}>{{$categ->name}}</option>
                @if ($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
    @endforeach
            </select>
        </div>
        <br><br>
@endif
            

            <button class="btn btn-primary" type="submit">Editar</button> <a class="btn btn-primary" href="{{ url('/produto')}}" >Voltar</a>
        </form>

    </div>
    
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
@endsection