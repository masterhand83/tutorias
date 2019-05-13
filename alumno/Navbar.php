
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <a class="navbar-brand" href="/tutorias/alumno/dashboard.php">Tutorias</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbar" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link <?=$place == 'dashboard'? 'active':''?>" href="/tutorias/alumno/dashboard.php">
                    Informacion de alumno
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$place == 'tutorias'? 'active':''?>" href="/tutorias/alumno/tutorias.php">
                    Tutorias disponibles
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$place == 'mis-tutorias'? 'active':''?>" href="/tutorias/alumno/mis_tutorias.php">
                    Mis Tutorias
                </a>
            </li>


        </ul>
        <form onclick="return false;" class="form-inline">
            <button class="btn btn-danger float-lg-right"
            onclick="closeSession(23)">
                Cerrar sesion
            </button>
        </form>
    </div>
</nav>