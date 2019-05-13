<?php
    $db->connect();
    $alumnos = $db->Query("SELECT * FROM db_tutorias.alumnobytutorias WHERE idtutoria = {$_REQUEST['idtutoria']};");
    $db->close();
?>
<div class="col-sm-12">
    <div class="card mt-3">
        <div class="card-header">
            Alumnos inscritos
            <button class="float-right btn btn-success" data-toggle="modal" data-target="#add-alumno" type="button">+</button>
        </div>
        <div class="card-body overflow-auto" style="max-height: 100px;">
            <?if(gettype($alumnos) == "array"){?>
            <table class="table" >
                <thead>
                    <th>Alumno</th>
                    <th>Boleta</th>
                    <th>Acciones</th>
                </thead>
                <tbody>

                    <?foreach ($alumnos as $alumno){?>
                        <tr>
                            <td><?=$alumno['Nombre']?></td>
                            <td><?=$alumno['Boleta']?></td>
                            <td>
                                <button
                                    class="btn float-right btn-outline-danger"
                                    onclick="leaveTutoria(<?=$alumno['idalumno']?>,<?=$alumno['idtutoria']?>)">
                                    Sacar de tutoria
                                </button>
                            </td>
                        </tr>
                    <?}?>

                </tbody>
            </table>
            <?}?>
        </div>
    </div>
</div>

<?php
$db->connect();
$all_alumnos = $db->QueryCall("showAlumnos({$_REQUEST['idtutoria']});");
$db->close();
?>
<div class="modal fade " id="add-alumno"
     tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">

            <div class="modal-header bg-success text-light">
                <h5 class="modal-title" id="exampleModalLongTitle">Crear Tutoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="input-control">
                    <select class="custom-select" name="" id="selected-alumno">
                        <?if(gettype($all_alumnos == "array")){?>
                            <?foreach ($all_alumnos as $alumno){?>
                                <option  value="<?=$alumno['AlumnoID']?>">
                                    <?=$alumno['Nombre']?> <?=$alumno['Apel_pat']?> <?=$alumno['Apel_mat']?>
                                </option>
                            <?}?>
                        <?}?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="assignTutoria(<?=$tutoria['idtutoria']?>)" class="btn btn-success">Asignar tutoria</button>
            </div>
        </div>
    </div>
</div>