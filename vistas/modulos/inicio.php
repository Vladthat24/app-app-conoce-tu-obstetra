<style>
    /*     @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"); */

    .login-block {
        /* background: #DE6262; */
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262);
        /* Chrome 10-25, Safari 5.1-6 */
        /*  background: linear-gradient(to bottom, #FFB88C, #DE6262); */
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        float: left;
        width: 100%;
        padding: 250px 0;
    }

    .banner-sec {
        /*         background: url(https://static.pexels.com/photos/33972/pexels-photo.jpg) no-repeat left bottom; */
        background-size: cover;
        min-height: 500px;
        border-radius: 0 10px 10px 0;
        padding: 0;
    }

    .container {
        background: #fff;
        border-radius: 10px;
        box-shadow: 15px 20px 0px rgba(0, 0, 0, 0.1);
    }

    /* 
         .carousel-inner {
        border-radius: 0 10px 10px 0;
    }
 */
    /*     .carousel-caption {
        text-align: left;
        left: 5%;
    }  */

    .login-sec {
        padding: 50px 30px;
        position: relative;
    }

    .login-sec .copy-text {
        position: absolute;
        width: 80%;
        bottom: 20px;
        font-size: 13px;
        text-align: center;
    }

    .login-sec .copy-text i {
        color: #FEB58A;
    }

    .login-sec .copy-text a {
        color: #E36262;
    }

    .login-sec h2 {
        margin-bottom: 30px;
        font-weight: 800;
        font-size: 30px;
        color: #DE6262;
    }

    .login-sec h2:after {
        content: " ";
        width: 100px;
        height: 5px;
        background: #FEB58A;
        display: block;
        margin-top: 20px;
        border-radius: 3px;
        margin-left: auto;
        margin-right: auto
    }

    .btn-login {
        background: #DE6262;
        color: #fff;
        font-weight: 600;
    }

    .banner-text {
        width: 70%;
        position: absolute;
        bottom: 40px;
        padding-left: 20px;
    }

    .banner-text h2 {
        color: #fff;
        font-weight: 600;
    }

    .banner-text h2:after {
        content: " ";
        width: 100px;
        height: 5px;
        background: #FFF;
        display: block;
        margin-top: 20px;
        border-radius: 3px;
    }

    .banner-text p {
        color: #fff;
    }
</style>
<section class="login-block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 login-sec">
                <h2 class="text-center">Habilidad en Línea</h2>

                <form class="login-form" role="form" method="post" enctype="multipart/form-data" action="verconstancia">
                    <?php

                    $cop = $_SESSION["idobstetra"];
                    $item = 'idobstetra';

                    $respuesta = ControladorRegistro::ctrMostrarObstetraInicio($item, $cop);

                    $n_cop = $respuesta["cop"];

                    $nombre = $respuesta["nombre"];
                    $apellidos = $respuesta["apellidos"];

                    if (isset($nombre) && isset($apellidos)) {
                    }

                    $fechacolegiatura = $respuesta["fecha_colegiatura"];

                    date_default_timezone_set('America/Lima');

                    $fecha = date('d/m/Y');


                    /**
                     * MOSTRAR EL COBHABILIDAD
                     */

                    $tablaCob = "habilidad";

                    $mostrarCobhabilidad = ModeloUsuarios::mdlMostrarCodHabilidad($tablaCob, $item, $cop);

                    $date1 = new DateTime(date_create_from_format("d/m/Y", $fechacolegiatura)->format("d-m-Y"));


                    $date2 = new DateTime(date_create_from_format("d/m/Y", $fecha)->format("d-m-Y"));

                    $diff = $date1->diff($date2);



                    //ID de Habilidad
                    $idhabilidad = $_SESSION["idhabilidad"];

                    /**
                     * Validar el estado login 
                     */


                    if ($_SESSION["estadologin"] == 0) {

                        /**
                         * Se actualiza el estado login de 0 a 1
                         */

                        $item1ELogin = "estadologin";
                        $valor1ELogin = 1;

                        $updateEstadoLogin = ControladorUsuarios::ctrActualizarHabilidad($item1ELogin, $valor1ELogin, $idhabilidad);

                        /**
                         * Se activa la fecha donde se asigna el codigo de habilitacion que 
                         * durara 90 dias
                         */
                        $itemFCH = "fechacobhabilidad";
                        $fechaFCH = date('d/m/Y');
                        $updateFechaCobHabilidad = ControladorUsuarios::ctrActualizarHabilidad($itemFCH, $fechaFCH, $idhabilidad);


                        $itemCobhabilidad = "cobhabilidad";
                        $maxValorCobHabilidad = ControladorUsuarios::ctrMostrarMaxValorCobhabilidad();

                        $valorMax = $maxValorCobHabilidad["cobhabilidad"];
                        $cobhabilidad_number = number_format($valorMax) + 1;

                        $updateCobhabilidad = ControladorUsuarios::ctrActualizarHabilidad($itemCobhabilidad, $cobhabilidad_number, $idhabilidad);

                        if ($updateEstadoLogin !== "ok" && $updateFechaCobHabilidad !== "ok" && $updateCobhabilidad == "ok") {

                            echo '<br><div class="alert alert-danger">Error al actualizar cob habilidad, vuelve a intentarlo</div>';
                        }
                    } else if ($_SESSION["estadologin"] == 1) {

                        /**
                         * Obtener la fecha de cob habilidad y ver si esta dentro de los 90 dias
                         */
                        $MostrarCobHabilidad = ControladorUsuarios::ctrMostrarCobhabilidad($idhabilidad);
                        $fCH = $MostrarCobHabilidad["fechacobhabilidad"];
                        $date1FechaCobHabilidad = new DateTime(date_create_from_format("d/m/Y", $fCH)->format("d-m-Y"));

                        $rangoFechaCobHabilidad = $date1FechaCobHabilidad->diff($date2);

                        if ($rangoFechaCobHabilidad->days >= 90) {
                            /*echo '<br><div class="alert alert-danger">Es afuera de los 90 dias</div>'; */

                            /**
                             * Se activa la fecha donde se asigna el codigo de habilitacion que 
                             * durara 90 dias
                             */
                            $itemFCH = "fechacobhabilidad";
                            $fechaFCH = date('d/m/Y');
                            $updateFechaCobHabilidad = ControladorUsuarios::ctrActualizarHabilidad($itemFCH, $fechaFCH, $idhabilidad);

                            //Se asigna un nuevo codigo de habilidad que dura 90 dias
                            $itemCobhabilidad = "cobhabilidad";
                            $maxValorCobHabilidad = ControladorUsuarios::ctrMostrarMaxValorCobhabilidad();

                            $valorMax = $maxValorCobHabilidad["cobhabilidad"];
                            $cobhabilidad_number = number_format($valorMax) + 1;

                            $updateCobhabilidad = ControladorUsuarios::ctrActualizarHabilidad($itemCobhabilidad, $cobhabilidad_number, $idhabilidad);

                            if ($updateFechaCobHabilidad !== "ok" && $updateCobhabilidad == "ok") {

                                echo '<br><div class="alert alert-danger">Error al actualizar cob habilidad, vuelve a intentarlo</div>';
                            }
                        } else {
                            
                            echo '<br><div class="alert alert-danger">Está dentro del rango de los 90 dias</div>';
                        }
                    }


                    //CONDICIONAL PARA VALIDAR LOS 3 MESES

                    if ($diff->days >= 90) {

                        $estado = "No habilitado";
                    } else {

                        $estado = "Habilitado";
                    }

                    /*  echo $diff->days . ' days '; */

                    ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase" style="font-size: 15px;color: #DE6262;">Cop:</label>
                        <label for="exampleInputEmail1" class="text-uppercase" style="font-size: 25px;margin-left: 15px;"><?php echo $n_cop; ?></label>
                        <input type="text" class="hidden" name="cop" value="<?php echo $n_cop; ?>">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase" style="font-size: 15px;color: #DE6262;">Nombres:</label>
                        <label for="exampleInputEmail1" class="text-uppercase" style="font-size: 20px;margin-left: 15px;"><?php echo $nombre; ?></label>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase" style="font-size: 15px;color: #DE6262;">Apellidos:</label>
                        <label for="exampleInputEmail1" class="text-uppercase" style="font-size: 20px;margin-left: 15px;"><?php echo $apellidos; ?></label>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase" style="font-size: 15px;color: #DE6262;">Estado:</label>
                        <label for="exampleInputEmail1" class="text-uppercase" style="font-size: 20px;margin-left: 15px;"><?php echo $estado; ?></label>

                    </div>


                    <div class="form-check">
                        <button type="submit" class="btn btn-login btn-lg" style="margin-left: 60px;margin-top: 20px;">Ver Constancia Habilidad</button>
                    </div>



                </form>
                <div class="copy-text">Colegio de Obstetras del Perú</i> -<a href="http://colegiodeobstetras.pe/"> Web</a></div>

                <div class="form-check">
                    <a href="salir" class="btn btn-login" style="margin-left: 120px;margin-top: 50px;">Salir</a>
                </div>

            </div>
            <div class="col-md-8 banner-sec">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="vistas/img/plantilla/fotomenuinicio.jpg" alt="Los Angeles" style="width:95.5%;;margin:70px 30px;">
                        </div>

                        <div class="item">
                            <img src="vistas/img/plantilla/inicio_quienessomos.jpg" alt="Chicago" style="width:93%;;margin:70px 30px;">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <!--                     <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a> -->

                </div>
            </div>
        </div>
</section>