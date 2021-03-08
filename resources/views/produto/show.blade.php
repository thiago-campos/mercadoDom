@extends('layouts.app')
@section('content')
<div class="container my-3">
<h1>Detalhes</h1>
<?php
if(!empty($produto)){

    foreach($produto as $pro){
        ?>
        <h2>Nome: <?= $pro->name; ?></h2>
        <p>Descrição: <?= $prop->description; ?></p>
        <p>Categoria: <?= $prop->category ?></p>
        <p>Criado em: <?= $pro->created_at ?></p>
        <?php
    }
}

?>
</div>
@endsection