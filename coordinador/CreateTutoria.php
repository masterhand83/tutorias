<?

$unidades = $db->Query('SELECT * FROM unidad;');


$profesores = $db->Query('SELECT * FROM profesor;');

?>
<div class="modal fade " id="exampleModalLong"
     tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header bg-success text-light">
                <h5 class="modal-title" id="exampleModalLongTitle">Crear Tutoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-row">
                        <div class="col-lg-6">
                            <div class="input-control">
                                <label for="unidad">Unidad de aprendizaje: </label>
                                <select class="custom-select" name="unidad" id="unidad">
                                    <?foreach ($unidades as $row){?>
                                        <option value="<?=$row['idunidad']?>"><?=$row['unidad']?></option>
                                    <?}?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-fd">
                                <label for="profesor">Profesor encargado: </label>
                                <select class="custom-select" name="profesor" id="profesor">
                                    <?foreach ($profesores as $row){?>
                                        <option value="<?=$row['idprofesor']?>"><?=$row['profesor']?></option>
                                    <?}?>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="form-row mt-2">
                        <div class="col-lg-9">
                            <div class="input-df">
                                <label for="type">Tipo de tutoria: </label>
                                <select class="custom-select" name="type" id="type">
                                    <option value="Regularizacion">Regularizacion</option>
                                    <option value="Recuperacion">Recuperacion</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="disponibles">Lugares disponibles: </label>
                                <input name="disponibles" step="1" min="1" max="50" type="number" class="form-control" id="disponibles">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col-lg-12 text-center">
                            <h4>Horario de la semana</h4>
                        </div>
                        <div class="col-lg-2 border">
                            <strong >Lunes</strong>
                            <div class="form-group">
                                <label for="inicio">Inicio</label>
                                <input name="lun_inicio" type="time" class="form-control" id="lun-inicio">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="termino">Termino</label>
                                <input name="lun_termino" type="time" class="form-control" id="lun-termino">
                            </div>
                        </div>
                        <div class="col-lg-2 border">
                            <strong >Martes</strong>
                            <div class="form-group">
                                <label for="inicio">Inicio</label>
                                <input name="mart_inicio" type="time" class="form-control" id="mart-inicio">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="termino">Termino</label>
                                <input name="mart_termino" type="time" class="form-control" id="mart-termino">
                            </div>
                        </div>
                        <div class="col-lg-2 border">
                            <strong >Miercoles</strong>
                            <div class="form-group">
                                <label  for="inicio">Inicio</label>
                                <input  name="mi_inicio" type="time" class="form-control" id="mi-inicio">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="termino">Termino</label>
                                <input name="mi_termino" type="time" class="form-control" id="mi-termino">
                            </div>
                        </div>
                        <div class="col-lg-2 border">
                            <strong >Jueves</strong>
                            <div class="form-group">
                                <label for="inicio">Inicio</label>
                                <input name="ju_inicio" type="time" class="form-control" id="mart-inicio">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="termino">Termino</label>
                                <input name="ju_termino" type="time" class="form-control" id="mart-termino">
                            </div>
                        </div>
                        <div class="col-lg-2 border">
                            <strong >Viernes</strong>
                            <div class="form-group">
                                <label for="inicio">Inicio</label>
                                <input name="vi_inicio" type="time" class="form-control" id="mart-inicio">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="termino">Termino</label>
                                <input name="vi_termino" type="time" class="form-control" id="mart-termino">
                            </div>
                        </div>
                        <div class="col-lg-2 border">
                            <strong >Sabado</strong>
                            <div class="form-group">
                                <label for="inicio">Inicio</label>
                                <input name="sab_inicio" type="time" class="form-control" id="mart-inicio">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="termino">Termino</label>
                                <input name="sab_termino" type="time" class="form-control" id="mart-termino">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Guardar tutoria</button>
            </div>
        </div>
    </div>
</div>