<?php

require_once "../controladores/registro.controlador.php";
require_once "../modelos/registro.modelo.php";

class AjaxRegistro
{
  /* =============================================
      EDITAR TICKET
      ============================================= */

  public $idRegistro;

  public function ajaxEditarRegistro()
  {


    $item = "cop";
    $valor = $this->idRegistro;

    $respuesta = ControladorRegistro::ctrMostrarRegistro($item, $valor);
    echo json_encode($respuesta);
  }
}


/* =============================================
  EDITAR TICKET
  ============================================= */

if (isset($_POST["idRegistro"])) {

  $editarRegistro = new AjaxRegistro();
  $editarRegistro->idRegistro = $_POST["idRegistro"];
  $editarRegistro->ajaxEditarRegistro();
}
