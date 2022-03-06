<?php

require_once "../../../controladores/registro.controlador.php";
require_once "../../../modelos/registro.modelo.php";
require_once "../../phpqrcode/qrlib.php";


class imprimirObstetra
{

    public $idObstetra;

    public function traerImpresionObstetra()
    {

        //TRAEMOS LA INFORMACION DEL TICKET
        $item = "idobstetra";
        $valorObstetra = $this->idObstetra;
        $respuesta = ControladorRegistro::ctrMostrarObstetraInicio($item, $valorObstetra);

        $dir = "tempqr/";

        if (!file_exists($dir)) {
            mkdir($dir);
        }

        $filename = $dir . "test.png";

        $tam = 1.5;
        $level = 'L';
        $frameSize = 2;

        $contenido = "https://constanciahabilidad.colegiodeobstetras.com/extensiones/tcpdf/pdf/constanciahabilidad.php?idObstetra=" . $valorObstetra;

        /* $contenido = "http://192.168.20.60:8085/app-constancia-obstetraV1.0/constanciahabilidadonline?idObstetra=" . $valorObstetra; */

        QRcode::png($contenido, $filename, $level, $tam, $frameSize);

        $qr = '<img src="' . $filename . '" style="width: 100px;"/>';




        $datoscompletos = $respuesta["nombre"] . " " . $respuesta["apellidos"];
        $cobhabilidad = $respuesta["cobhabilidad"];

        $n_cop = $respuesta["cop"];
        if (isset($datoscompletos) && isset($n_cop)) {
        }

        date_default_timezone_set('America/Lima');

        setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");
        $dia_mes = strftime("%d de %B");
        $a_o = strftime('%y');


        $datoscompletos_ = substr($datoscompletos, 0);
        $n_cop_ = substr($n_cop, 0);
        $dia_mes_ = substr($dia_mes, 0);
        $a_o_ = substr($a_o, 0);

        //---------------------------------------------------------------------------------------
        require_once('./tcpdf_include.php');

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->startPageGroup();
        $pdf->AddPage();

        /*         $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false); */

        // set margins
        $pdf->SetMargins(0, 0, 0, true);

        // set auto page breaks false
        $pdf->SetAutoPageBreak(false, 0);

        // add a page
        /*         $pdf->AddPage('P', 'A4'); */

        $img_file = "images/formato.png";
        $pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);

        $pdf->setPageMark();


        $bloque1 = <<<EOF
        <table style="font-size:8px; padding:5px 10px;" border="0">
        <tr>
       
           <td>
               
               
           </td>
       </tr>
        <tr>
           <td style="width: 270px">
              
               
           </td>
           <td style="width: 270px;">
              
               
           </td>
       </tr>
       
       
       <tr>
           <td style="width: 270px">
               
               
           </td>
           <td style="width: 270px; text-align:left">
             
               
           </td>
       </tr>
       <tr>
           <td style="width: 170px">
           
               
           </td>
             <td style="width: 370px">
              
               
            </td>
       </tr>

       <tr >
           <td colspan="2">
             
               
           </td>
           <td></td>
       </tr> 
       <tr>
       
           <td>
               
               
           </td>
       </tr>
       
       <tr>
           <td >
                  
               
           </td>
           <td >
               
               
           </td>

       </tr>
       <tr>
           <td >
               
               
           </td>
           <td >
           
               
           </td>

       </tr>
       <tr>
           <td >
                
               
           </td>   
           <td >
                 
              
           </td>

       </tr>
       <tr>
       
           <td>
              
               
           </td>
       </tr>
   
       <tr>
           <td colspan="2">
                  
                   
            </td>
           <td>
           </td>
         

        </tr>

        <tr>
     
           <td style="width:75mm;"></td>
           <td colspan="2" >
               <div style="font-size: 13px;margin: left 100px;"><strong>DECANA/O NACIONAL DEL</strong></div>
               
           </td>
           <td></td>


       </tr>
       <tr>
  
           <td style="width:62mm;"></td>
           <td><div style="font-size: 13px;"><strong>COLEGIO DE OBSTETRAS DEL PERÚ</strong></div></td>
           <td></td>

       </tr>

       </table>

       <table style="font-size:8px; padding:5px 10px;" border="0"> 
       <tr>
           <td style="width: 170px">
           
               
           </td>
             <td style="width: 370px">
              
               
            </td>
       </tr>
       <tr>
       
           <td>
              
               
           </td>
       </tr>

       <tr>
           <td >
              
               
           </td>
           <td >
                
             
           </td>

       </tr>

       <tr>
           <td colspan="2">
              
                           
           </td>

       </tr>

       <tr>
           <td style="height:11.5mm;">
               
               
           </td>
           <td >
               
               
           </td>

       </tr>
       <tr>
           <td></td> 
           <td>
                <div style="WIDTH:186.41mm;margin-left: 70px;margin-top:0px;font-size: 14px;">
                    <strong>$datoscompletos_</strong>
                </div>
                           
           </td>
           <td></td>

       </tr>
       <tr>
           <td style="height:25px;">
          
                       
           </td>
           <td colspan="2">   

           </td>
           <td></td>
       </tr>

       <tr>
          
           <td style="text-align:rigth;font-size: 12px;letter-spacing: 0.25em;word-spacing: 0.25em;font-style: italic;height:105px;">

                    <strong>$n_cop_</strong>
     
                       
           </td>
           <td >
           
                       
           </td>
           <td >
           
                       
           </td>

       </tr>

       <tr>

           <td style="text-align: center;font-style: italic;font-size: 12px;width: 150px;height:26px;">
                    
           </td>
           <td style="font-style: italic;font-size: 10px;width: 130px;">
                <strong>PUEBLO LIBRE</strong>
           </td>
           <td style="font-style: italic;font-size: 10px;width: 130px;">
               <strong>$dia_mes_</strong>
           </td>
           <td style="font-style: italic;font-size: 10px;width: 130px;">
               <strong>$a_o_</strong>
            </td>
       </tr>
       <tr>
           <td style="font-size:8px;width: 150px;text-align:center">
                 
                  
           </td>
           <td style="font-size:10px;width: 100px;text-align:center;">
               
               <strong >HVP-$cobhabilidad</strong>
               
           </td>

           <td style="font-size:8px;width: 180px;text-align:center">
                
           </td>
       </tr>

       </table>

<table border="0">
<tbody>
       <tr>
            <td style="width:25mm;height:11mm;"></td>
            <td style="width:25mm;"></td>
            <td style="width:25mm;"></td>
            <td></td>
            <td style="width:20mm;"></td>
            <td></td>
            <td></td>
         
            
       </tr>
       <tr>
            <td colspan="7"></td>
 
       </tr>
            
       <tr>
            <td></td>
            <td rowspan="2" style="width: 70px;">
            <br>
            <br>
            <br>
           
            $qr
            </td>
            <td></td>
            <td></td>
            <td><img src="images/sello_xio_original.PNG" style="width:50px;"></td>
            <td><img src="images/firma_xio.png" style="margin: 0%;width:80px;"></td>
            <td></td>
            
       </tr>
       <tr>
            <td></td>
            
            <td></td> 
            <td></td>

            <td colspan="3" style="text-align:center;">
                    <span style="font-style: italic;font-size: 10px;"><strong>Obstra. Margarita Perez Silva</strong></span><br>
                    <span style="font-style: italic;font-size: 10px;">Decana Nacional</span>         
            </td>
        
            
       </tr>
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

if (isset($_GET["idObstetra"])) {

    //VALIDAR SI ESTA DENTRO DEL RANGO DE LOS 90 DIAS
    $item = "cop";

    $resp = ControladorRegistro::ctrMostrarObstetraInicio($item, $_GET["idObstetra"]);



    $fechaColegiatura = $resp["fecha_colegiatura"];

    date_default_timezone_set('America/Lima');

    $fecha = date('d/m/Y');

    $date1 = new DateTime(date_create_from_format("d/m/Y", $fechaColegiatura)->format("d-m-Y"));


    $date2 = new DateTime(date_create_from_format("d/m/Y", $fecha)->format("d-m-Y"));


    $diff = $date1->diff($date2);



    if ($diff->days >= 90) {
        echo '<script>
                window.location.href="http://192.168.1.4/app-constancia-obstetraV1.0/index.php?ruta=noautorizado";

              </script>';
    } else {

        $obstetra = new imprimirObstetra();

        $obstetra->idObstetra = $_GET["idObstetra"];
        $obstetra->traerImpresionObstetra();
    }
}
