<div id="tutoria<?=$row['idtutoria']?>" class="col-lg-4 col-md-6 col-sm-12 mb-3">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-light text-center">
            <h4><?=$row['unidad']?></h4><small>[tipo de unidad]</small>
        </div>
        <div class="card-body">
            <div class="card-text text-justify">
                <h5>Profesor: <span class="text-info"><?=$row['profesor']?></span></h5>
                <h5>
                    Lugares disponibles: <span class="badge badge-pill badge-success"><?=$row['disponibles']?></span>
                </h5>
            </div>
            <button
                class="btn btn-block btn-outline-info mt-3 mb-2"
                data-toggle="collapse"
                data-target="#horario<?=$row['idtutoria']?>">
                Mostrar horario
            </button>
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
                        substr($row['lunes'],8,5)
                        ?>
                    </td>
                    <td>
                        <?=
                        substr($row['martes'],0,5).
                        substr($row['martes'],8,5)
                        ?>
                    </td>
                    <td>
                        <?=
                        substr($row['miercoles'],0,5).
                        substr($row['miercoles'],8,5)
                        ?>
                    </td>
                    <td>
                        <?=
                        substr($row['jueves'],0,5).
                        substr($row['jueves'],8,5)
                        ?>
                    </td>
                    <td>
                        <?=
                        substr($row['viernes'],0,5).
                        substr($row['viernes'],8,5)
                        ?>
                    </td>
                    <td>
                        <?=
                        substr($row['sabado'],0,5).
                        substr($row['sabado'],8,5)
                        ?>
                    </td>
                </tr>
                </tbody>
            </table>
            <?if($tutoria_mode != 'show'){?>
                <button
                        id="tutoria-button<?=$row['idtutoria']?>"
                        onclick="askTutoria(<?=$row['idtutoria']?>,<?=$userID?>)"
                        class="mt-4 btn btn-block btn-outline-success">
                    Aplicar para tutoria
                </button>
            <?}else{?>
                <button
                        id="tutoria-button<?=$row['idtutoria']?>"
                        onclick="downloadTutoria(<?=$row['idtutoria']?>,<?=$userID?>)"
                        class="mt-4 btn btn-block btn-outline-success">
                    Descargar formato
                </button>
            <?}?>
        </div>
    </div>
</div>