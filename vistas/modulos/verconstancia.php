<?php
/* if (isset($_POST["cop"])) {
    echo "GENIAL";
    $cop = $_POST["cop"];
    $item = 'idobstetra';


    $respuesta = ControladorRegistro::ctrMostrarObstetraInicio($item, $cop);

    $datoscompletos = $respuesta["nombre"] . " " . $respuesta["apellidos"];

    $n_cop = $respuesta["cop"];
    if (isset($datoscompletos) && isset($n_cop)) {
    }
} else {
} */

$cop = $_SESSION["idobstetra"];
$item = 'idobstetra';


$respuesta = ControladorRegistro::ctrMostrarObstetraInicio($item, $cop);

$datoscompletos = $respuesta["nombre"] . " " . $respuesta["apellidos"];

$n_cop = $respuesta["cop"];
if (isset($datoscompletos) && isset($n_cop)) {
}

$dir = "tempqr/";

if (!file_exists($dir)) {
    mkdir($dir);
}

$filename = $dir . "test.png";

$tam = 2;
$level = 'L';
$frameSize = 2;

$contenido = "http://192.168.20.60:8085/app-constancia-obstetraV1.0/extensiones/tcpdf/pdf/constanciahabilidad.php?idObstetra=" . $cop;

QRcode::png($contenido, $filename, $level, $tam, $frameSize);

$qr = '<img src="' . $filename . '"/>';



/* var_dump($cop); */

date_default_timezone_set('America/Lima');

setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");
$dia_mes = strftime("%d de %B");
$a_o = strftime('%y');

?>

<style>
    td {
        border: hidden;
    }
</style>
<html id="menu">

<head>


</head>


<body>
    <div class="content" style="width: 790px;height: 100%;">

        <form action="" name="form1" method="">

            <table cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td style="display:none;width:25%"></td>
                        <td style="display:none;width:6px"></td>
                        <td style="width: 100%;"></td>
                    </tr>
                    <tr style="display: none;">
                        <td colspan="3"></td>
                    </tr>
                    <tr style="height: 6px;font-size:2pt;display:none;">
                        <td colspan="3" style="padding:0px;margin:0px;text-align:center;background-color:#ECE9D8;">
                        </td>
                    </tr>
                    <tr style="display: none;">

                    </tr>
                    <tr>
                        <td style="vertical-align: top; width: 25%; height: 1120px; display: none;">

                        </td>
                        <td style="display: none; width: 4px; padding: 0px; margin: 0px; height: 1120px; vertical-align: middle; background-color: rgb(236, 233, 216);">

                        </td>
                        <td style="height: 1120px; vertical-align: top;">
                            <style>
                                .bo {
                                    background-image: url('vistas/img/plantilla/formatoii.png');
                                    background-repeat: no-repeat;
                                    border: 1pt none Black;
                                    background-color: Transparent;
                                    width: 100%;
                                }
                            </style>

                            <div style="height:100%;width:100%;overflow:auto;position:relative;">
                                <div style="height: 100%;">
                                    <div style="width:100%;direction:ltr;">
                                        <table cellspacing="0" cellpadding="0" style="font-family: Times New Roman;">
                                            <tbody style="display: table-row-group;vertical-align: middle;border-color: inherit;">
                                                <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
                                                    <td style="zoom: 100%;display:table-cell;vertical-align:inherit;">


                                                        <div>



                                                            <table class="bo" cellspacing="0" cellpadding="0" boder="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="vertical-align: top;">
                                                                            <table>
                                                                                <tbody style="display: table-row-group;vertical-align: middle;border-color: inherit;">
                                                                                    <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">

                                                                                        <td style="HEIGHT:54.65mm;WIDTH:0.00mm"></td>
                                                                                        <td style="WIDTH:5.81mm;min-width: 5.81mm;"></td>
                                                                                        <td style="WIDTH:14.92mm;min-width: 14.92mm;"></td>
                                                                                        <td style="WIDTH:4.69mm;min-width: 4.69mm;"></td>
                                                                                        <td style="WIDTH:0.35mm;min-width: 0.35mm;"></td>
                                                                                        <td style="WIDTH:5.75mm;min-width: 5.75mm;"></td>
                                                                                        <td style="WIDTH:6.35mm;min-width: 6.35mm;"></td>
                                                                                        <td style="WIDTH:3.47mm;min-width: 3.47mm;"></td>
                                                                                        <td style="WIDTH:30.71mm;min-width: 30.71mm;"></td>
                                                                                        <td style="WIDTH:4.89mm;min-width: 4.89mm;"></td>
                                                                                        <td style="WIDTH:2.09mm;min-width: 2.09mm;"></td>
                                                                                        <td style="WIDTH:16.96mm;min-width: 16.96mm;"></td>
                                                                                        <td style="WIDTH:4.15mm;min-width: 4.15mm;"></td>
                                                                                        <td style="WIDTH:11.52mm;min-width: 11.52mm;"></td>
                                                                                        <td style="WIDTH:8.62mm;min-width: 8.62mm;"></td>
                                                                                        <td style="WIDTH:5.69mm;min-width: 5.69mm;"></td>
                                                                                        <td style="WIDTH:2.96mm;min-width: 2.96mm;"></td>
                                                                                        <td style="WIDTH:9.66mm;min-width: 9.66mm;"></td>
                                                                                        <td style="WIDTH:2.96mm;min-width: 2.96mm;"></td>
                                                                                        <td style="WIDTH:9.66mm;min-width: 9.66mm;"></td>
                                                                                        <td style="WIDTH:2.96mm;min-width: 2.96mm;"></td>

                                                                                    <tr valign="top">
                                                                                        <td style="HEIGHT:9.17mm;WIDTH:0.00mm">

                                                                                        </td>
                                                                                        <td colspan="11">
                                                                                            <table cellspacing='0' cellpanding='0' lang="es-Es">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td style="WIDTH:119.48mm;min-width: 118.06mm;HEIGHT:7.76mm;">
                                                                                                            <div style="width:118.06mm">

                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                        <td rowspan="2" colspan="4">
                                                                                        <td>

                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td style="HEIGHT:9.17mm;WIDTH:0.00mm">

                                                                                        </td>
                                                                                        <td colspan="11">

                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr valign="top">
                                                                                        <td style="HEIGHT:7.59mm;WIDTH:0.00mm"></td>
                                                                                        <td rowspan="2" colspan="6"></td>
                                                                                        <td colspan="8">
                                                                                            <table cellspacing="0" cellpadding="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td style="WIDTH:56.88mm;min-width: 55.47mm;HEIGHT:6.18mm;">
                                                                                                            <div style="width: 55.47mm;">


                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                        <td rowspan="4" colspan="3"></td>
                                                                                    </tr>
                                                                                    <tr></tr>
                                                                                    <tr>
                                                                                        <td style="HEIGHT:3.23mm;WIDTH:0.00mm"></td>
                                                                                        <td colspan="8"></td>
                                                                                    </tr>
                                                                                    <tr valingn="top">
                                                                                        <td style="HEIGHT:7.59mm;WIDTH:0.00mm"></td>
                                                                                        <td colspan="7">
                                                                                            <table cellspacing="0" cellpadding="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td style="WIDTH:56.22mm;min-width: 54.81mm;HEIGHT:6.18mm;">
                                                                                                            <div style="WIDTH:54.81mm;">

                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                        <td rowspan="2" colspan="7">
                                                                                            <div style="text-align: center;font-size: 20px;"> <strong>COLEGIO DE OBSTETRAS DEL PERÚ</strong></div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="HEIGHT:10.72mm;WIDTH:0.00mm"></td>
                                                                                        <td colspan="7">
                                                                                    </tr>
                                                                                    <tr valingn="top">
                                                                                        <td style="HEIGHT:7.59mm;WIDTH:0.00mm"></td>
                                                                                        <td colspan="20">
                                                                                            <table cellspacing="0" cellpadding="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td style="text-align: center; WIDTH:187.82mm;min-width: 186.41mm;HEIGHT:6.44mm;">
                                                                                                            <div style="WIDTH:186.41mm;">

                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="HEIGHT:8.02mm;WIDTH:0.00mm">

                                                                                        </td>
                                                                                        <td colspan="20"></td>
                                                                                    </tr>
                                                                                    <tr valingn="top">
                                                                                        <td colspan="20">
                                                                                            <table cellspacing="0" cellpadding="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td style="text-align: center; WIDTH:187.82mm;min-width: 186.41mm;HEIGHT:6.44mm;">
                                                                                                            <div style="WIDTH:186.41mm;">

                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="HEIGHT:8.02mm;WIDTH:0.00mm">

                                                                                        </td>
                                                                                        <td colspan="20"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="HEIGHT:3.10mm;WIDTH:0.00mm">

                                                                                        </td>
                                                                                        <td colspan="20"></td>
                                                                                    </tr>
                                                                                    <tr valingn="top">
                                                                                        <td colspan="20">
                                                                                            <table cellspacing="0" cellpadding="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td style="text-align: center; WIDTH:187.82mm;min-width: 186.41mm;HEIGHT:6.44mm;">
                                                                                                            <div style="WIDTH:186.41mm;">

                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr></tr>
                                                                                    <tr valingn="top">
                                                                                        <td colspan="20">
                                                                                            <table cellspacing="0" cellpadding="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td style="text-align: center; WIDTH:187.82mm;min-width: 186.41mm;HEIGHT:6.44mm;">
                                                                                                            <div style="WIDTH:186.41mm;">

                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>


                                                                                    <tr valingn="top">
                                                                                        <td colspan="20">
                                                                                            <table cellspacing="0" cellpadding="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td style="text-align: center; WIDTH:187.82mm;min-width: 186.41mm;HEIGHT:12.48mm;">
                                                                                                            <div style="WIDTH:186.41mm;margin-left: 70px;font-size: 19px;">
                                                                                                                <strong><?php echo $datoscompletos; ?></strong>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="HEIGHT:12.02mm;WIDTH:0.00mm">

                                                                                        </td>
                                                                                        <td colspan="20"></td>
                                                                                    </tr>
                                                                                    <tr valingn="top"></tr>
                                                                                    <tr>
                                                                                        <td style="HEIGHT:6.90mm;WIDTH:0.00mm">

                                                                                        </td>
                                                                                        <td colspan="5"></td>
                                                                                        <td colspan="2">
                                                                                            <div style="font-size: 15px;letter-spacing: 0.25em;word-spacing: 0.25em;font-style: italic;">
                                                                                                <strong><?php echo $n_cop; ?></strong>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td colspan="14"></td>
                                                                                    </tr>


                                                                                    <tr>
                                                                                        <td style="HEIGHT:11.02mm;WIDTH:0.00mm">

                                                                                        </td>
                                                                                        <td colspan="5"></td>
                                                                                        <td rowspan="2" colspan="5"></td>

                                                                                    </tr>

                                                                                    <tr valingn="top"></tr>


                                                                                    <!--OTRO CUERPO-->
                                                                                    <tr>
                                                                                        <td style="HEIGHT:8.02mm;WIDTH:0.00mm">

                                                                                        </td>
                                                                                        <td colspan="20"></td>

                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="HEIGHT:8.02mm;WIDTH:0.00mm">

                                                                                        </td>
                                                                                        <td colspan="20"></td>

                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td style="HEIGHT:8mm;WIDTH:0.00mm">

                                                                                        </td>
                                                                                        <td colspan="2"></td>
                                                                                        <td colspan="5" style="HEIGHT:8mm;WIDTH:15.00mm"></td>
                                                                                        <td colspan="3">
                                                                                            <div style="text-align: center;font-style: italic;font-size: 14px;">
                                                                                                <strong>PUEBLO LIBRE</strong>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td colspan="3">
                                                                                            <div style="margin-left: 39px;font-style: italic;font-size: 16px;">
                                                                                                <strong><?php echo $dia_mes; ?></strong>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td colspan="3">
                                                                                            <div style="margin-left: 20px;font-style: italic;font-size: 19px;">
                                                                                                <strong><?php echo $a_o; ?></strong>
                                                                                            </div>
                                                                                        </td>

                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="HEIGHT:8mm;WIDTH:0.00mm">

                                                                                        </td>

                                                                                        <td colspan="7"></td>
                                                                                        <td colspan="4">
                                                                                            <div style="margin-left: 35px;height: 10px;">
                                                                                                HOLA
                                                                                            </div>
                                                                                        </td>
                                                                                        <td colspan="9"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="HEIGHT:8.02mm;WIDTH:0.00mm">

                                                                                        </td>
                                                                                        <td colspan="20"></td>

                                                                                    </tr>
<!--                                                                                     <tr>
                                                                                        <td style="HEIGHT:8.02mm;WIDTH:0.00mm">

                                                                                        </td>
                                                                                        <td colspan="20"></td>
                                                                                    </tr> -->


                                                                                    <tr valingn="top">
                                                                                        <td style="HEIGHT:9.70mm;WIDTH:0.00mm"></td>
                                                                                        <td rowspan="2" colspan="4"></td>
                                                                                        <td colspan="5">
                                                                                            <table cellspacing="0" cellpadding="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td style="WIDTH:58.13mm;min-width: 56.71mm;HEIGHT:8.29mm;">
                                                                                                            <div style="WIDTH:56.71mm;">
                                                                                                                <div>
                                                                                                                <?php echo $qr; ?>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                        <td rowspan="2" colspan="2"></td>
                                                                                        <td colspan="5">
                                                                                            <table cellspacing="0" cellpadding="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td style="WIDTH:58.13mm;min-width: 56.71mm;HEIGHT:8.29mm;">
                                                                                                            <div style="WIDTH:56.71mm;">
                                                                                                                <div>
                                                                                                                    <span></span>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                        <td rowspan="3" colspan="2"></td>

                                                                                    </tr>
       <!--                                                                              <tr>
                                                                                        <td style="HEIGHT:8.02mm;WIDTH:0.00mm">

                                                                                        </td>
                                                                                        <td colspan="5"></td>
                                                                                        <td rowspan="2" colspan="5"></td>

                                                                                    </tr> -->
                                                                                    <tr>
                                                                                        <td style="HEIGHT:8.02mm;WIDTH:0.00mm">

                                                                                        </td>
                                                                                        <td colspan="5"></td>
                                                                                        <td rowspan="2" colspan="5"></td>

                                                                                    </tr>

                                                                                    <tr valingn="top">
                                                                                        <td style="HEIGHT:0.21mm;WIDTH:0.00mm"></td>
                                                                                        <td rowspan="3" colspan="3"></td>
                                                                                        <td rowspan="2" colspan="7">
                                                                                            <table cellspacing="0" cellpadding="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td style="WIDTH:58.13mm;min-width: 56.71mm;HEIGHT:8.29mm;">
                                                                                                            <div style="WIDTH:56.71mm;">
                                                                                                                <div>
                                                                                                                    <span></span>
                                                                                                                </div>
                                                                                                                <div>
                                                                                                                    <span> </span>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                        <td colspan="3"></td>
                                                                                    </tr>
                                                                                    <tr valingn="top">
                                                                                        <td style="HEIGHT:1.21mm;WIDTH:0.00mm"></td>
                                                                                        <td rowspan="2" colspan="1"></td>
                                                                                        <td rowspan="1" colspan="7">
                                                                                            <table cellspacing="0" cellpadding="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td style="WIDTH:58.13mm;min-width: 56.71mm;HEIGHT:13.29mm;">
                                                                                                            <div style="WIDTH:56.71mm;">
                                                                                                                <div style="font-style: italic;font-size: 14px;">
                                                                                                                    <span><strong>Mg. Margarita Perez Silva</strong></span>
                                                                                                                </div>
                                                                                                                <div style="font-style: italic;font-size: 14px;margin-left: 35px;">
                                                                                                                    <span>Decana Nacional</span>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                        <td colspan="3"></td>
                                                                                    </tr>

                                                                                    <tr valingn="top"></tr>
                                                                                    <tr>
                                                                                        <td style="HEIGHT:8.02mm;WIDTH:0.00mm">

                                                                                        </td>
                                                                                        <td colspan="20"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="HEIGHT:8.02mm;WIDTH:0.00mm">

                                                                                        </td>
                                                                                        <td colspan="20" style="HEIGHT:8.02mm;WIDTH:0.00mm"></td>

                                                                                    </tr>
                                                                                    <!--                                                                                     <tr>
                                                                                        <td style="HEIGHT:8.02mm;WIDTH:0.00mm">

                                                                                        </td>


                                                                                    </tr> -->



                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>


                </tbody>

            </table>
        </form>
        <div class="">

            <button class="btn btn-primary btn btn-lg btnImprimirObstetra" idobstetra=<?php echo $_SESSION["idobstetra"]; ?> style="margin-left: 320px;margin-top: 10px;background-color: #81172D;">Imprimir</button>

        </div>
        <div>
            <a href="salir" class="btn btn-primary btn.imprimir" style="margin-left: 342px;margin-top: 2px;background-color: #81172D;">Salir</a>
        </div>





    </div>



</body>

</html>