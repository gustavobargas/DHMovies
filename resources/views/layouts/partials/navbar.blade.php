<div class="row">
    <nav class="navbar navbar-expand-sm navbar-dark fixed-top bg-dark my-0 ">
        <a class="navbar-brand" href="home">
            <img src="https://1.bp.blogspot.com/-kVq_LhhcjaU/WYW7u9xxxLI/AAAAAAAADZI/Df11A_OynP8-LEoU-4JgWdVo8OqOTOF4gCLcBGAs/s1600/peliculas%2Blogo.png" width="210" class="my-0" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/actors">Actores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/genres">Generos de Peliculas</a>
                </li>
                @if (Auth::check() && Auth::user()->id === 1)
                <li class="nav-item">
                    <a class="nav-link" href="/backoffice">Administrar</a>
                </li>
                @endif
            </ul>
            <ul class="navbar-nav ml-auto ml-auto ml-auto my-lg-0">
                @if (Auth::check())
                    <li style="color:white;">
                        Bienvenid@ {{Auth::user()->name}}
                    </li>
                    <br>
                    <br>
                    <a href="{{ url('/logout') }}"> logout </a>
                @else
                    <li class="nav-item my-2 my-lg-0">
                        <a class="nav-link mr-sm-2" href="/login">Iniciar sesión</a>
                    </li>
                    <li class="nav-item my-2 my-lg-0">
                        <a class="nav-link mr-sm-2" href="/register">Registrarse</a>
                    </li>
                @endif
            </ul>
        
        </div>
    </nav>
</div>
<div class="spacer"></div>
