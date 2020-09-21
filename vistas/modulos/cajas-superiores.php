<?php
$tabla = "registro";
$item = null;
$valor = null;

$cantidadRegistro = ModeloRegistro::mdlCantidadRegistros($tabla, $item, $valor);

foreach ($cantidadRegistro as $key => $va) {
    $cantidadColegiado = $va["CANTIDAD"]; //ULTIMO REGISTRO 
}

$tabla2 = "usuarios";
$item2 = null;
$valor2 = null;

$usuario = ModeloRegistro::mdlCantidadRegistros($tabla2, $item2, $valor2);

foreach ($usuario as $key => $va) {
    $cantidadUsuario = $va["CANTIDAD"]; //ULTIMO REGISTRO 
}

?>

<div class="col-lg-6 col-xs-12">

    <div class="small-box bg-aqua">

        <div class="inner">

            <h3 style="text-align: center;"><?php echo number_format($cantidadColegiado); ?></h3>
            <p style="text-align: center;">CANTIDAD DE COLEGIADO</p>
            <h4 style="text-align: center">REGISTRO</h4>

        </div>

        <div class="icon">

            <i class="ion ion-person-add"></i>

        </div>

        <a href="registro" class="small-box-footer">

            Más info <i class="fa fa-arrow-circle-right"></i>

        </a>

    </div>

</div>
<div class="col-lg-6 col-xs-12">

    <div class="small-box bg-aqua">

        <div class="inner">

            <h3 style="text-align: center;"><?php echo number_format($cantidadUsuario); ?></h3>
            <p style="text-align: center;">CANTIDAD DE USUARIOS</p>
            <h4 style="text-align: center">ACCESOS</h4>

        </div>

        <div class="icon">

            <i class="ion ion-person-add"></i>

        </div>

        <a href="usuarios" class="small-box-footer">

            Más info <i class="fa fa-arrow-circle-right"></i>

        </a>

    </div>

</div>

<div class="col-lg-12 col-xs-12">

    <div class="small-box bg-red">

        <div class="inner">

            <h2 style="text-align: center">Colegio de Obstetras del Perú</h2>

            <h4 style="text-align: justify">El Colegio de Obstetras del Perú, es una entidad autónoma, con personería de derecho público interno, reconocida por el Artículo 20º de la Constitución Política del Perú y representativa de los profesionales Obstetras en todo el territorio de la República, de conformidad al Decreto Ley N° 21210 modificado y a la Ley Nº 28686</h4>

        </div>

        <a href="registro" class="small-box-footer">

            Más info <i class="fa fa-arrow-circle-right"></i>

        </a>

    </div>

</div>