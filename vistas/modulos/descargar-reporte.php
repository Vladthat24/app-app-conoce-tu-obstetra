<?php

require_once "../../controladores/plantilla.controlador.php";
require_once "../../controladores/usuarios.controlador.php";
require_once "../../controladores/categorias.controlador.php";
require_once "../../controladores/ticket.controlador.php";
require_once "../../controladores/clientes.controlador.php";
require_once "../../controladores/ventas.controlador.php";
require_once "../../controladores/soporte.controlador.php";
require_once "../../controladores/estado.controlador.php";
require_once "../../controladores/distrito.controlador.php";
require_once "../../controladores/documento.controlador.php";
require_once "../../controladores/reporteticket.controlador.php";

require_once "../../modelos/usuarios.modelo.php";
require_once "../../modelos/categorias.modelo.php";
require_once "../../modelos/ticket.modelo.php";
require_once "../../modelos/clientes.modelo.php";
require_once "../../modelos/ventas.modelo.php";
require_once "../../modelos/soporte.modelo.php";
require_once "../../modelos/estado.modelo.php";
require_once "../../modelos/distrito.modelo.php";
require_once "../../modelos/documento.modelo.php";
require_once "../../modelos/reporteticket.modelo.php";

$reporte = new ControladorTicket();
$reporte -> ctrDescargarReporte();




