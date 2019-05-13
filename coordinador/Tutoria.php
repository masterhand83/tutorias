<div id="tutoria<?=$row['idtutoria']?>" class="col-lg-4 col-md-6 col-sm-12 mb-3">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-light text-center">
            <h4><?=$row['unidad']?></h4><small>[<?=$row['tipoTutoria']?>]</small>
        </div>
        <div class="card-body">
            <div class="card-text text-justify">
                <h5>Profesor: <span class="text-info"><?=$row['profesor']?></span></h5>
                <h5>
                    Lugares disponibles: <span class="badge badge-pill badge-success"><?=$row['disponibles']?></span>
                </h5>
            </div>
            <div class="btn-group d-flex" role="group">
                <button
                        type="button"
                        onclick="generateAlumnoList(<?=$row['idtutoria']?>)"
                        class=" btn  btn-outline-info">
                    lista de alumnos
                </button>
                <button
                        type="button"
                        class="btn  btn-outline-info "
                        data-toggle="collapse"
                        data-target="#horario<?=$row['idtutoria']?>">
                    Mostrar horario
                </button>
            </div>
            <table id="horario<?=$row['idtutoria']?>" class="collapse table table-responsive table-bordered">
                <thead class="table-info">
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miercoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sabado</th>
                </thead>
                <tbody class="text-center">
                <tr>
                    <td><?=
                        substr($row['lunes'],0,5).
                        substr($row['lunes'],8,6)
                        ?>
                    </td>
                    <td>
                        <?=
                        substr($row['martes'],0,5).
                        substr($row['martes'],8,6)
                        ?>
                    </td>
                    <td>
                        <?=
                        substr($row['miercoles'],0,5).
                        substr($row['miercoles'],8,6)
                        ?>
                    </td>
                    <td>
                        <?=
                        substr($row['jueves'],0,5).
                        substr($row['jueves'],8,6)
                        ?>
                    </td>
                    <td>
                        <?=
                        substr($row['viernes'],0,5).
                        substr($row['viernes'],8,6)
                        ?>
                    </td>
                    <td>
                        <?=
                        substr($row['sabado'],0,5).
                        substr($row['sabado'],8,6)
                        ?>
                    </td>
                </tr>
                </tbody>
            </table>

            <button
                    id="tutoria-button<?=$row['idtutoria']?>"
                    onclick="goToEditTutoria(<?=$row['idtutoria']?>)"
                    class="mt-4 btn btn-block btn-outline-warning">
                Editar tutoria
            </button>
            <button
                    id="tutoria-button<?=$row['idtutoria']?>"
                    onclick="deleteTutoria(<?=$row['idtutoria']?>)"
                    class="mt-4 btn btn-block btn-outline-danger">
                Eliminar tutoria
            </button>


        </div>
    </div>
</div>