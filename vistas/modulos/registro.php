<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Registro de Colegiado

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar Registro de Colegiado</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-danger" style="background-color: #81172d;" data-toggle="modal" data-target="#modalAgregarColegiado">

                    Agregar Colegiado

                </button>

                <button class="btn btn-primary" style="background-color: #81172d;" id="actualizar"><img src="vistas/img/plantilla/android-o-iconos-adaptivos.gif" width="30px" /></button>

            </div>



            <div class="box-body" id="resultados">

                <br>
                <table class="table table-bordered table-striped dt-responsive tablaRegistro tablaActualizar" width="100%">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>ACCIONES</th>
                            <th>COP</th>
                            <th>DATOS COMPLETOS</th>
                            <th>COLEGIOS REGIONAL</th>
                            <th>ESTADO</th>
                            <th>POST GRADO</th>
                            <th>IMAGEN</th>
                            <th>DIGITADOR</th>

                        </tr>

                    </thead>



                </table>

            </div>

        </div>

    </section>

</div>


<!--=====================================
MODAL AGREGAR VISITA
======================================-->

<div id="modalAgregarColegiado" class="modal fade" role="dialog" style="overflow-y: scroll;">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#81172d; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Colegiado </h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="content">

                        <div class="row">

                            <!-- ENTRADA PARA NOMBRE FUNCIONARIO -->
                            <div class="fron-row">

                                <div class="form-group col-md-12">

                                    <div class="input-group">

                                        <span class="input-group-addon">Apellido Paterno:</span>

                                        <input type="text" class="form-control input-lx" name="nuevApellidoPaterno" placeholder="Apellido Paterno" required>


                                    </div>

                                </div>

                                <!-- ENTRADA PARA NOMBRE FUNCIONARIO -->

                                <div class="form-group col-md-12">

                                    <div class="input-group">

                                        <span class="input-group-addon">Apellido Materno:</span>

                                        <input type="text" class="form-control input-lx" name="nuevApellidoMaterno" placeholder="Apellido Materno" required>
                                        <input type="text" class="form-control input-lx hidden" id="codigoUnicoReclamo" name="codigoUnicoReclamo" require>
                                    </div>

                                </div>

                                <!-- ENTRADA PARA CARGO FUNCIONARIO -->

                                <div class="form-group col-md-12">

                                    <div class="input-group">

                                        <span class="input-group-addon">Nombre:</span>

                                        <input type="text" class="form-control input-lx" name="nuevNombre" placeholder="Nombres" required>

                                    </div>

                                </div>

                                <!-- ENTRADA PARA COLEGIO REGIONAL -->

                                <div class="form-group col-md-12">

                                    <div class="input-group">

                                        <span class="input-group-addon">Colegio Regional:</span>

                                        <input type="text" class="form-control input-lx" name="nuevColegioRegional" required>

                                    </div>

                                </div>


                                <div class="form-group col-md-12">

                                    <div class="input-group">

                                        <span class="input-group-addon bord">Estado:</span>

                                        <select class="form-control input-lx" name="nuevEstado">

                                            <option value="Habilitado">Habilitado</option>
                                            <option value="No Habilitado">No Habilitado</option>

                                        </select>
                                    </div>


                                </div>


                                <div class="form-group col-md-12">

                                    <div class="input-group">

                                        <span class="input-group-addon">Post Grado:</span>

                                        <input type="text" class="form-control input-lx" name="nuevPostGrado" required>

                                    </div>

                                </div>

                                <!-- ENTRADA PARA USUARIO REGISTRADOR -->

                                <div class="form-group col-md-12">

                                    <div class="input-group">

                                        <span class="input-group-addon">Digitador:</span>

                                        <input type="text" class="form-control input-lx" name="nuevUsuarioDigitador" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                                    </div>

                                </div>

                                <!-- ENTRADA PARA SUBIR FOTO -->

                                <div class="form-group">

                                    <div class="panel">Subir Foto</div>
                                    <style>
                                        input {
                                            border-color: white;
                                        }
                                    </style>
                                    <input type="file" class="nuevaImagen inputfile" name="nuevaImagen">


                                    <p class="help-block">Peso máximo de la imagen 2MB</p>

                                    <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                                </div>



                            </div>


                        </div>
                    </div>
                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary" style="background-color: #81172d;">Guardar Colegiado</button>

                </div>

            </form>

            <?php

            $registroColegiado = new ControladorRegistro();
            $registroColegiado->ctrCrearRegistro();


            ?>

        </div>

    </div>

</div>

</div>

<!--=====================================
MODAL EDITAR REGISTRO
======================================-->

<div id="modalEditarRegistro" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                    CABEZA DEL MODAL
                    ======================================-->

                <div class="modal-header" style="background:#81172d; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar Colegiado </h4>

                </div>

                <!--=====================================
                    CUERPO DEL MODAL
                    ======================================-->

                <div class="modal-body">

                    <div class="content">

                        <div class="row">

                            <!-- ENTRADA PARA NOMBRE FUNCIONARIO -->
                            <div class="fron-row">

                                <div class="form-group col-md-12">

                                    <div class="input-group">

                                        <span class="input-group-addon">Apellido Paterno:</span>

                                        <input type="text" class="form-control input-lx" id="editarApellidoPaterno" name="editarApellidoPaterno">
                                        <input type="text" class="form-control input-lx hidden" id="editarIdRegistro" name="editarIdRegistro">

                                    </div>

                                </div>

                                <!-- ENTRADA PARA NOMBRE FUNCIONARIO -->

                                <div class="form-group col-md-12">

                                    <div class="input-group">

                                        <span class="input-group-addon">Apellido Materno:</span>

                                        <input type="text" class="form-control input-lx" id="editarApellidoMaterno" name="editarApellidoMaterno" placeholder="Apellido Materno" required>

                                    </div>

                                </div>

                                <!-- ENTRADA PARA CARGO FUNCIONARIO -->

                                <div class="form-group col-md-12">

                                    <div class="input-group">

                                        <span class="input-group-addon">Nombre:</span>

                                        <input type="text" class="form-control input-lx" id="editarNombre" name="editarNombre" placeholder="Nombres" required>

                                    </div>

                                </div>

                                <!-- ENTRADA PARA COLEGIO REGIONAL -->

                                <div class="form-group col-md-12">

                                    <div class="input-group">

                                        <span class="input-group-addon">Colegio Regional:</span>

                                        <input type="text" class="form-control input-lx" id="editarColegioRegional" name="editarColegioRegional" required>

                                    </div>

                                </div>


                                <div class="form-group col-md-12">

                                    <div class="input-group">

                                        <span class="input-group-addon bord">Estado:</span>

                                        <select class="form-control input-lx" name="editarEstado">

                                            <option id="editarEstado"></option>
                                            <option value="Habilitado">Habilitado</option>
                                            <option value="No Habilitado">No Habilitado</option>

                                        </select>
                                    </div>


                                </div>


                                <div class="form-group col-md-12">

                                    <div class="input-group">

                                        <span class="input-group-addon">Post Grado:</span>

                                        <input type="text" class="form-control input-lx" id="editarPostGrado" name="editarPostGrado" required>

                                    </div>

                                </div>

                                <!-- ENTRADA PARA USUARIO REGISTRADOR -->

                                <div class="form-group col-md-12">

                                    <div class="input-group">

                                        <span class="input-group-addon">Digitador:</span>

                                        <input type="text" class="form-control input-lx" id="editarUsuarioDigitador" name="editarUsuarioDigitador" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                                    </div>

                                </div>

                                <!-- ENTRADA PARA SUBIR FOTO -->

                                <div class="form-group">

                                    <div class="panel">Subir Foto</div>
                                    <style>
                                        input {
                                            border-color: white;
                                        }
                                    </style>
                                    <input type="file" class="nuevaImagen inputfile" name="editarImagen">


                                    <p class="help-block">Peso máximo de la imagen 2MB</p>

                                    <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                                    <input type="hidden" name="imagenActual" id="imagenActual">
                                </div>

                            </div>


                        </div>
                    </div>
                </div>

                <!--=====================================
                    PIE DEL MODAL
                    ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary" style="background-color: #81172d;">Guardar Colegiado</button>

                </div>

            </form>
            <?php

            $editarVisita = new ControladorRegistro();
            $editarVisita->ctrEditarRegistro();


            ?>


        </div>

    </div>

</div>

<?php
$eliminarRegistro = new ControladorRegistro();
$eliminarRegistro->ctrEliminarRegistro();
?>