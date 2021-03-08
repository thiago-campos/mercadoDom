<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Novo Produto</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <div class="container">
        <h1>Novo Produto</h1>

        <form action="{{ route('produto.store') }}" class="form-group" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" value="{{$produto->name}}" name="name" id="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Descrição:</label>
                <input type="text" value="{{$produto->description}}" name="description" id="description" class="form-control">
            </div>

@if (!empty($categories)) 
        <div class='form-group'>
            <select class='form-select' name="category" id="category"  aria-label='Default select example'>
            <option selected>Selecione a Categoria</option>
    @foreach ($categories as $categ)
                <option value='{{$categ->id}}' {{$produto->category === $categ->id ? 'selected' : ''}}>{{$categ->name}}</option>

    @endforeach
            </select>
        </div>
        <br><br>
@endif
            

            <button class="btn btn-primary" type="submit">Cadastrar</button>
        </form>

    </div>
    
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>