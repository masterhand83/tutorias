
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <a class="navbar-brand" href="/tutorias/coordinador/dashboard.php">Tutorias</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbar" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link <?=$place == 'dashboard'? 'active':''?>" href="/tutorias/coordinador/dashboard.php">
                    Tutorias
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$place == 'alumnos'? 'active':''?>" href="/tutorias/coordinador/alumnos.php">
                    Alumnos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$place == 'profesores'? 'active':''?>" href="/tutorias/coordinador/profesores.php">
                    Profesores y unidades
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$place == 'graficas'? 'active':''?>" href="/tutorias/coordinador/graficas.php">
                    Graficas y Analisis
                </a>
            </li>


        </ul>
        <form onsubmit="return false;" class="form-inline">
            <button class="btn btn-danger float-lg-right"
            onclick="closeSession(23)">
                Cerrar sesion
            </button>
        </form>
    </div>
</nav>