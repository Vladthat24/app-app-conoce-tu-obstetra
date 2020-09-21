<?php
@session_start();
//#3c8dbc
//367fa9
//357ca5
require_once "../controladores/registro.controlador.php";
require_once "../modelos/registro.modelo.php";


require_once "../controladores/funcionario.controlador.php";
require_once "../modelos/funcionario.modelo.php";

class TablaRegistro
{
  /* =============================================
      MOSTRAR LA TABLA DE TICKET
      ============================================= */

  public function mostrarTablaRegistro()
  {

    $item = null;
    $valor = null;

    $registro = ControladorRegistro::ctrMostrarRegistro($item, $valor);

    if (count($registro) == 0) {

      echo '{"data": []}';

      return;
    }

    $datosJson = '{
		  "data": [';

    for ($i = 0; $i < count($registro); $i++) {

      /* =============================================
       TRAEMOS LAS ACCIONES
       ============================================= */

      $imagen = "<a href='" . $registro[$i]["imagen"] . "' onclick='windows.open()'><img src='" . $registro[$i]["imagen"] . "' width='40px'></a>";
      $botones = "<div class='btn-group'></button><button class='btn btn-warning btnEditarRegistro' idRegistro='" . $registro[$i]["cop"] . "' data-toggle='modal' data-target='#modalEditarRegistro'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarRegistro' idRegistro='" . $registro[$i]["cop"] . "'imagen='" . $registro[$i]["imagen"] . "'><i class='fa fa-times'></i></button></div>";

      $datosJson .= '[
			                        "' . ($i + 1) . '",
                              "' . $botones . '",                                                            
                              "' . $registro[$i]["cop"] . '",
                              "' . $registro[$i]["datos_completos"] . '",
                              "' . $registro[$i]["colegio_regional"] . '",
                              "' . $registro[$i]["estado"] . '",
                              "' . $registro[$i]["post_grado"] . '",
                              "' . $imagen . '",
                              "' . $registro[$i]["usuario"] . '"
			    ],';
    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson .= '] 

		 }';

    echo $datosJson;
  }
}

/* =============================================
  ACTIVAR TABLA DE PRODUCTOS
  ============================================= */
$activarRegistro = new TablaRegistro();
$activarRegistro->mostrarTablaRegistro();
