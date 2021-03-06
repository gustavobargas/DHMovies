<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Movie;
use Illuminate\Routing\Controller;

class GenreMovieController extends Controller
{
    public function index()
    {
       {
        $movie = Movie::find(1);
        $movies = Movie::all();
        $movies = Movie::make()->sortByTitle()->paginate(10);
        
        foreach($movies as $movie) {
            $movie->genre_id = Genre::find($movie->genre_id)['name'];
        }
        //dd($movies);

        return view("movies.genre", compact('movies'));
        

        // $movies = Movie::paginate($limit);
       

        // Metodo de collection para devolver JSON
        // return Movie::all()->toJson();

        // Ejemplo de callback
        // $movies->filter(function ($movie) {
        //     return $movie->title !== 'Avatar';
        // })->dd();

        // return view('movies.index')->with('movies', $movies);
           }
    }

    public function show()
    {
        $movie = Movie::find();
        return view('movies.show', ['movies'=>$movies]);
    }

    public function search(Request $request)
    {
        $title = Movie::where('title', 'LIKE', $request->input('busqueda'))->get();
            if(count($title) > 0 ){
                return $title->toJson();
            }else{
                return "No se encontraron resultados" ;
           }
    }

    public function create()
    {
        // El metodo create SOLO devuelve la vista del formulario de creacion
        // mas lo que necesitemos para la generacion del mismo, en este caso los generos, 
        // que son de OTRO modelo.
        $genres = Genre::all();
        return view('movies.create')->with('genres', $genres);
    }

    public function store(Request $request)
    {
        //VALIDACION
        // Aplicamos las reglas. Como en todo array asociativo, tenemos claves y valores.
        // En este caso, las claves (del lado izquierdo), son LOS NAME del formulario, mientras que 
        // del lado derecho tenemos los valores, que son las reglas y pueden ser bastante mas amplias
        $reglas = [
            'title' => 'required',
            'rating' => 'required',
            'awards' => 'required',
            'length' => 'required',
            'release_date' => 'date|required',
            'genre_id' => 'required'
        ];

        // Podemos customisar el mensaje de error de esta manera. el valor :attribute hace referencia
        // a alguno de los name del formulario que hayan entrado por Request.
        // En este caso el mensaje es el mismo pero lo traducimos al castellano.
        $mensajes = [
            'required' => 'el campo :attribute es obligatorio'
        ];

        //
        $this->validate($request, $reglas, $mensajes);

        // Queda comentada la modalidad para insertar campo por campo
        // $movie = new Movie([
        //     'title' => $request->input('titulo'),
        //     'rating' => $request->input('rating'),
        //     'length' => $request->input('duracion'),
        //     'awards' => $request->input('premios'),
        //     'release_date' => $request->input('fecha_de_estreno'),
        //     'genre_id' => $request->input('genero'),
        // ]);

        // Manejo de archivos:
        $file = $request->poster->store('posters', 'public');

        //Queda activa la manera de crear el nuevo objeto mandando el array completo

        // Metodo mas corto (8/11)
        //Movie::create($request->all());

        $movie = new Movie($request->all());
        // Le asigno el path del archivo al objeto para que luego se inserte en la base de datos
        $movie->photopath = $file;

        $movie->save();

        redirect('/movies');

    }

    public function edit($id)
    {
        // el metodo edit es la responsabilidad del controlador de mostrar la vista de edicion de un recurso.
        // Para cargar la vista de edicion, en este caso tengo que mandarla con la pelicula (con su ID) y ademas su genero actual buscandolo individualmente ($genre), MAS los posibles generos que puedan llegar a tomar su lugar ($genres)


        $genres = Genre::all();
        

        $movie = Movie::find($id);

        // si el encadenamiento de metodos se extiende mucho...
        // return view('movies.editmovie')->with('movie', $movie)->with('genre', $genre)->with('genres', $genres);
        // podemos acortarlo asi:
        return view('movies.edit')
            ->with('movie', $movie)
            ->with('genre', $movie->genre)
            ->with('genres', $genres);

    }

    public function update(Request $request, $id)
    {
        //El metodo que realmente va a insertar los datos ACTUALIZADOS en la DB, es este, update.
        // Inicialmente volvemos a buscarla con Eloquent:
        $movie = Movie::find($id);

        // Luego  vamos campo por campo asignando el nuevo dato o el que haya quedado en el value
        $movie->title = $request->input("title");
        $movie->rating = $request->input("rating");
        $movie->awards = $request->input("awards");
        $movie->length = $request->input("length");
        $movie->release_date = $request->input("release_date");
        $movie->genre_id = $request->input("genre_id");
        // Y aca, tambien usamos save(), porque es la misma operacion pero sobre algo que ya existe
        $movie->save();

        //en este caso, redirigimos al perfil de la pelicula que editamos para observar los cambios
        return redirect("/movies/$movie->id");

    }

    public function destroy($id)
    {
        // Este es el metodo dedicado a BORRAR un elemento individual de muestra base de datos.
        // Queda sin efecto porque tenemos que ver otros temas antes de poder usarlo.
    }
}

