@extends('layouts.master') 
@section('content')

<br>
<div class="offset-2 col-6">
    <h1>Listado de Peliculas con genero</h1>
    <br>
    <ul>
        @foreach($movies as $movie)
        <li>
            
            <a href="movies/{{ $movie->id }}">{{ $movie->title }}</a>
            (<a href="movies/{{ $movie->genre_id }}">{{ $movie->genre_id }}</a>)
        </li>
        @endforeach
        <?php echo $movies->appends(['movies' => 'genres'])->render(); ?>
    </ul>

    <form class="form-inline my-2 my-lg-0" action="{{route('buscar')}}" method="get">
            {{ csrf_field() }}
                <input class="form-control mr-sm-2" type="text" placeholder="Buscar peliculas por título..." aria-label="Buscar..." name="busqueda">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    <br>
</div>
    
@endsection