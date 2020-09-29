<?php

require_once "../../../controladores/registro.controlador.php";
require_once "../../../modelos/registro.modelo.php";



class imprimirObstetra
{

    public $idObstetra;

    public function traerImpresionObstetra()
    {
        //TRAEMOS LA INFORMACION DEL TICKET
        $item = "idobstetra";
        $valorObstetra = $this->idObstetra;
        $respuesta = ControladorRegistro::ctrMostrarObstetraInicio($item, $valorObstetra);

        $datoscompletos = $respuesta["nombre"] . " " . $respuesta["apellidos"];

        $n_cop = $respuesta["cop"];
        if (isset($datoscompletos) && isset($n_cop)) {
        }

        date_default_timezone_set('America/Lima');

        setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");
        $dia_mes = strftime("%d de %B");
        $a_o = strftime('%y');


        $datoscompletos_ = json_decode($datoscompletos, true);
        $n_cop_ = json_decode($n_cop, true);
        $dia_mes_ = json_decode($dia_mes, true);
        $a_o = json_decode($a_o, true);

        //---------------------------------------------------------------------------------------
        require_once('./tcpdf_include.php');

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->startPageGroup();
        $pdf->AddPage();

        $bloque1 = <<<EOF
                                                    <table>
                                                      
                                                    <tbody style="width:200px">
                                                            <tr><img src="images/formatoii.png"></tr>
                                                        </tbody>
                                                    </table>

        
EOF;
        $pdf->writeHTML($bloque1, false, false, false, false, '');
        //------------------------------------------------------------------

        //------------------------------------------------------------------

        //******************************************************************
        //SALIDA DEL ARCHIVOS
        $pdf->Output('printObstetra.pdf');
    }
}

$obstetra = new imprimirObstetra();
$obstetra->idObstetra = $_GET["idObstetra"];
$obstetra->traerImpresionObstetra();
