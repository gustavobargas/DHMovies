@extends('layouts.app')

@section('content')

<section class="d-flex flex-direction-row col-10 offset-1">
    <article class="col-6 offset-1">
        <div class="">
            <img class="rounded-circle" alt="Generic placeholder image" width="140" height="140">
            <h2>{{ $user->name }}</h2>
            <h4>{{ $user->email }}</h4>
            <p>Miembro desde: {{ $user->created_at }}</p>
            <p><a class="btn btn-warning" href="#">Editar perfil</a></p>
        </div>
    </article>
</section>



@endsection