<?php

require_once "../../../controladores/ticket.controlador.php";
require_once "../../../modelos/ticket.modelo.php";

require_once "../../../controladores/categorias.controlador.php";
require_once "../../../modelos/categorias.modelo.php";

require_once "../../../controladores/estado.controlador.php";
require_once "../../../modelos/estado.modelo.php";

require_once "../../../controladores/soporte.controlador.php";
require_once "../../../modelos/soporte.modelo.php";

require_once "../../../controladores/distrito.controlador.php";
require_once "../../../modelos/distrito.modelo.php";

class imprimirTicket
{

    public $idTicket;

    public function traerImpresionTicket()
    {
        //TRAEMOS LA INFORMACION DEL TICKET
        $item = "id";
        $valorTicket = $this->idTicket;
        $item2 = null;
        $valor2 = null;

        $respuestaTicket = ControladorTicket::ctrMostrarTicket($item, $valorTicket, $item2, $valor2);


        $categoria = json_decode($respuestaTicket["id_categoria"], true);
        $codigo = json_decode($respuestaTicket["codigo"], true);
        $descripcion = substr($respuestaTicket["descripcion_paciente"], 0);

        $dni = substr($respuestaTicket["dni"], 0);
        $nombre_paciente = substr($respuestaTicket["nombre_paciente"], 0);
        $edad_paciente = substr($respuestaTicket["edad_paciente"], 0);
        $direccion_paciente = substr($respuestaTicket["direccion_paciente"], 0);
        $distrito_paciente = substr($respuestaTicket["distrito_paciente"], 0);
        $telefono_paciente = substr($respuestaTicket["telefono_paciente"], 0);
        $comoAB_paciente = substr($respuestaTicket["comoAB_paciente"], 0);
        $muestra_paciente = substr($respuestaTicket["muestra_paciente"], 0);

        $FechaSintomas = substr($respuestaTicket["FechaSintomas"], 0);
        $Sintomas = substr($respuestaTicket["Sintomas"], 0);
        $Tos = substr($respuestaTicket["Tos"], 0);
        $DolorGarganta = substr($respuestaTicket["DolorGarganta"], 0);
        $Fiebre = substr($respuestaTicket["Fiebre"], 0);
        $SecrecionNasal = substr($respuestaTicket["SecrecionNasal"], 0);
        $OtroSintomas = substr($respuestaTicket["OtroSintomas"], 0);
        $Viaje = substr($respuestaTicket["Viaje"], 0);
        $NumeroViaje = substr($respuestaTicket["NumeroViaje"], 0);
        $ContactoPersonaSospechosa = substr($respuestaTicket["ContactoPersonaSospechosa"], 0);
        $DatosPersonaSospechosa = substr($respuestaTicket["DatosPersonaSospechosa"], 0);
        $CelPersonaSospechosa = substr($respuestaTicket["CelPersonaSospechosa"], 0);


        $nombre = substr($respuestaTicket["nombre"], 0);
        $oficina = substr($respuestaTicket["oficina"], 0);
        $area = substr($respuestaTicket["area"], 0);
        /*         $cargo = substr($respuestaTicket["cargo"], 0);
        $cel = substr($respuestaTicket["cel"], 0);
        $sede = substr($respuestaTicket["sede"], 0);
        $piso = substr($respuestaTicket["piso"], 0); */
        $id_estado = json_decode($respuestaTicket["id_estado"], true);
        $id_distrito = json_decode($respuestaTicket["id_distrito"], true);
        $fecha = substr($respuestaTicket["fecha"], 0);

        //TREAR NOMBRE DE CATEGORIA 
        $item_catg = "id";
        $valor_catg = $categoria;
        $respuestaCatg = ControladorCategorias::ctrMostrarCategorias($item_catg, $valor_catg);

        $categoria_nombre = substr($respuestaCatg["categoria"], 0);
        //---------------------------------------------------------------------------------------
        //TREAR NOMBRE DE ESTADO
        $item_estado = "id";
        $valor_estado = $id_estado;
        $respuestaEstado = ControladorEstado::ctrMostrarEstado($item_estado, $valor_estado);

        //TREAR DISTRITO
        $item_distrito = "id";
        $valor_distrito = $id_distrito;
        $respuestaDistrito = ControladorDistrito::ctrMostrarDistrito($item_distrito, $valor_distrito);
        $distrito_nombre = substr($respuestaDistrito["distrito"], 0);
        $estado_nombre = substr($respuestaEstado["estado"], 0);
        //---------------------------------------------------------------------------------------
        //TREAR NOMBRE DE ESTADO
        /*         $item_soporte = "soporte";
        $valor_soporte = $soporte;
        $respuestaSoporte = ControladorSoporte::ctrMostrarSoporte($item_soporte, $valor_soporte);

        $soporte_nombre = substr($respuestaSoporte["soporte"], 0); */
        //---------------------------------------------------------------------------------------
        require_once('./tcpdf_include.php');

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->startPageGroup();
        $pdf->AddPage();

        $bloque1 = <<<EOF
       
	<table>
		
		<tr>
			<br>
			<td style="width:200px"><img src="images/image_demo.jpg"></td>

			<td style="background-color:white; width:140px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
                        Central Telefónica: 
                        (+51) 477 5360, 477 5770, 477 3458 
				</div>

            </td>
            
			<td style="background-color:white; width:185px">

				<div style="font-size:9px; text-align:center; line-height:15px;">
					
					Área de Programación y Desarrollo Informático<br>
                    ETF Tecnologías de la Información 

				</div>
				
			</td>

			

		</tr>

	</table>
        
        
        
EOF;
        $pdf->writeHTML($bloque1, false, false, false, false, '');
        //------------------------------------------------------------------
        $bloque2 = <<<EOF
<h5 style="text-align:center;">FICHA DE REGISTRO</h5>       
<h5 style="text-align:center;">ETF-Epidemiología e Inteligencia Sanitaria</h5>  
   <table style="font-size:8px; padding:5px 10px;">
                 <tr>
                
                    <td>
                        <strong>1. DATOS GENERALES DE LA NOTIFICACION: </strong>
                        
                    </td>
                </tr>
                 <tr>
                    <td style="border: 1px solid #666; background-color:white; width: 270px">
                        1. Fecha y Hora: $fecha
                        
                    </td>
                    <td style="border: 1px solid #666; background-color:white; width: 270px; text-align:left">
                        2. Clasificacion del Caso :  $estado_nombre
                        
                    </td>
                </tr>
                
                
                <tr>
                    <td style="border: 1px solid #666; background-color:white; width: 270px">
                        3. Categoria:  $categoria_nombre
                        
                    </td>
                    <td style="border: 1px solid #666; background-color:white; width: 270px; text-align:left">
                        4. Codigo: $codigo
                        
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid #666; background-color:white; width: 170px">
                        3. EESS:  $distrito_paciente
                        
                    </td>
                      <td style="border: 1px solid #666; background-color:white; width: 370px">
                        5. Ditectado en punto de Entrada:  ........ SI / ...... NO / ....... Desconocido
                        
                     </td>
                </tr>
         
                <tr >
                    <td style="border: 1px solid #666;" colspan="2">
                        6. Ditectado en punto de Entrada:  
                        Si la respuesta es si, fecha :  _____/______/________    Lugar: _______________________________________
                        
                    </td>
                    <td></td>
                </tr> 
                <tr>
                
                    <td>
                        <strong>2. DATOS DEL PACIENTE: </strong>
                        
                    </td>
                </tr>
                
                <tr>
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 200px;text-align:center">
                        DNI: $dni    
                        
                    </td>
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 340px;text-align:center">
                        Nombre: $nombre_paciente
                        
                    </td>

                </tr>
                <tr>
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 300px;text-align:center">
                          Fecha de Nacimiento : _____-_______-________
                        
                    </td>
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 240px;text-align:center">
                         Edad:  $edad_paciente 
                        
                    </td>

                </tr>
                <tr>
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 300px;text-align:center">
                        Sexo :  ________ Masculino   /  ________ Femenino   
                        
                    </td>   
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 240px;text-align:center">
                          
                        Telf./Cel.: $telefono_paciente  
                    </td>

                </tr>
                <tr>
                
                    <td>
                        <strong>2.1. LUGAR PROBABLE DE INFECCIÓN: </strong>
                        
                    </td>
                </tr>
            
                <tr>
                    <td style="border: 1px solid #666;" colspan="2">
                            6. Lugar donde fue diagnosticado:  
                            Pais :  ___________    Provincia: __________________________  Distrito: ______________________
                            
                        </td>
                    <td></td>
                  

                 </tr>

                 <tr>
                
                    <td>
                        <strong>2.2. INFORMACION DEL DOMICILIO DEL PACIENTE: </strong>
                        
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid #666;" colspan="2">
                            6. Domicio del paciente:  $direccion_paciente
                                   
                        </td>
                    <td></td>

                </tr>
                
                <tr>
                    <td style="border: 1px solid #666;" colspan="2">
                    Pais :  ___________    Provincia: __________________________  Distrito: $distrito_nombre
                                
                        </td>
                    <td></td>

                </tr>
                <tr>
                
                    <td>
                        <strong>4. CUADRO CLINICO: </strong>
                        
                    </td>
                </tr>

                <tr>
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 200px;text-align:center">
                        Fecha de Sintoma :  $FechaSintomas 
                        
                    </td>
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 340px;text-align:center">
                         
                        _______________ Asintomatico / ______________ Desconocido
                    </td>

                </tr>

                <tr>
                    <td style="border: 1px solid #666;" colspan="2">
                        Hospitalizacion: ________ SI / _________ NO / __________ DESCONOCIDO
                                    
                    </td>

                </tr>
                <tr>
                
                    <td colspan="2">
                        <strong>4.1. Si fue hospitalizado, complete la siguiente informacion: </strong>
                        
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 250px;text-align:center">
                        Fecha de Hospitalizacion : _______-_________-_______ 
                        
                    </td>
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 290px;text-align:center">
                        Nombre de Hospital: _________________________________
                        
                    </td>

                </tr>
                <tr>
                    <td style="border: 1px solid #666;" colspan="2">
                        Aislamiento: _________SI / ______ NO          Fecha de aislamiento: ______-______-__________
                                    
                    </td>

                </tr>
                <tr>
                    <td style="border: 1px solid #666;" colspan="2">
                    El paciente estuvo en ventilacion mecánica: ________ SI / _________ NO / __________ DESCONOCIDO
                                
                    </td>
                </tr>

                <tr>
                   
                    <td style="border: 1px solid #666;" colspan="2">
                    Evolucion del Paciente: ________ Recuperado / _________ No Recuperado / __________ Falleció / _________ Desconocido
                                
                    </td>
                </tr>

                <tr>

                    <td style="border: 1px solid #666;" colspan="2">
                    <strong>Síntomas:</strong> $Sintomas  
                                
                    </td>

                </tr>
                <tr>
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 180px;text-align:center">
                          
                        ¿Fiebre?:   $Fiebre  
                    </td>
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 180px;text-align:center">
                        
                        Malestar General : ________
                        
                    </td>

                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 180px;text-align:center">
                        
                        ¿Presenta TOS?:  $Tos 
                   
                    </td>
                </tr>
                <tr>
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 180px;text-align:center">
                          
                        ¿DolorGarganta?:  $DolorGarganta 
                    </td>
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 180px;text-align:center">
                        ¿Secrecion Nasal?: $SecrecionNasal
                        
                    </td>

                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 180px;text-align:center">
                        Dificultad Respiratorio: _________
                   
                    </td>
                </tr>
                <tr>
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 180px;text-align:center">
                        Diarrea: ________
                        
                    </td>
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 180px;text-align:center">
                          
                         Náuseas/Vómitos: _________
                    </td>
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 180px;text-align:center">
                        Cefalea: _________  
                            
                    </td>
                </tr>

                <tr>
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 180px;text-align:center">
                        Irritabilidad/Confusión: ___________
                        
                    </td>
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 180px;text-align:center">
                          
                         Otro Sintoma: $OtroSintomas 
                    </td>
                    <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 180px;text-align:center">
                        ¿Viaje?:  $Viaje  
                            
                    </td>
                </tr>
                <tr>
                   
                    <td style="border: 1px solid #666;" colspan="3">
                    Evolucion del Paciente: ________ Recuperado / _________ No Recuperado / __________ Falleció / _________ Desconocido
                                
                    </td>
                </tr>

                <tr>

                <td style="border: 1px solid #666;" colspan="2">
                <strong>Signos:</strong> 
                            
                </td>

            </tr>
            <tr>
                <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 180px;text-align:center">
                      
                    Exudado Faríngeo:   ________  
                </td>
                <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 180px;text-align:center">
                    
                    Inyeccion Conjuntival : ________
                    
                </td>

                <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 180px;text-align:center">
                    
                    Convulsión: ________ 
               
                </td>
            </tr>
            <tr>
                <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 180px;text-align:center">
                      
                    Coma: _____
                </td>
                <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 180px;text-align:center">
                    Disnea/Taquipnea: _____
                    
                </td>

                <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 180px;text-align:center">
                   Auscultación pulmonar, anormal: _____
               
                </td>
            </tr>
            <tr>
                <td style="font-size:8px;border: 1px solid #666; background-color:white; width: 200px;text-align:center">
                    Hallazgos anormales en Rx pulmonar: _____
                    
                </td>
                <td style="border: 1px solid #666;width: 340px;" colspan="2">
                Otros, especificar:
                            
                </td>
            </tr>
             
</table>
        
        
EOF;
        $pdf->writeHTML($bloque2, false, false, false, false, '');
        //-------------------------------------------------------------------------------------------------------------------------------

        //------------------------------------------------------------------
        $bloque4 = <<<EOF
<br>
<br>
<p style="text-align:center;font-size: xx-small;">--------------------------------------</p>
<p style="text-align:center;font-size: xx-small;">$nombre<br>$area<br>$oficina</p>
<p style="text-align:center;font-size: xx-small;">DIGITADOR</p>        
        
EOF;
        $pdf->writeHTML($bloque4, false, false, false, false, '');
        //------------------------------------------------------------------

        //******************************************************************
        //SALIDA DEL ARCHIVOS
        $pdf->Output('printTicket.pdf');
    }
}

$ticket = new imprimirTicket();
$ticket->idTicket = $_GET["idTicket"];
$ticket->traerImpresionTicket();
