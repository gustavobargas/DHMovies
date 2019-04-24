@extends('layouts.master')
@role('admin')

@section('content')
<main role="main">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Hola Admin! Que hacemos hoy?</h1>
        <p>Selecciona una de estas opciones</p>
        <p><a class="btn btn-primary btn-lg" href="/movies/create" role="button">Agregar nueva pelicula</a></p>
        <p><a class="btn btn-primary btn-lg" href="/movies/edit" role="button">Editar pelicula</a></p>
        <p><a class="btn btn-primary btn-lg" href="/users/show" role=button">Editar listado de usuarios registrados</a></p>
    </div>
    </div>

</main>

@endrole
@endsection
