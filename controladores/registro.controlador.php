<?php

class ControladorRegistro
{

  /*=============================================
	MOSTRAR DATOS CON LA CONSULTA
	=============================================*/

  /*   static public function ctrMostrarConsulta($item1, $valor1, $item2, $valor2, $item3, $valor3, $item4, $valor4)
  {

    $tabla = "registro";
    $item = null;
    $respuesta = ModeloRegistro::mdlMostrarConsulta($tabla, $item, $item1, $valor1, $item2, $valor2, $item3, $valor3, $item4, $valor4);

    return $respuesta;
  } */


  /*=============================================
	RANGO FECHAS
	=============================================*/

  /*   static public function ctrRangoFechasRegistro($fechaInicial, $fechaFinal)
  {

    $tabla = "Tap_RegistroVisita";

    $respuesta = ModeloRegistro::mdlRangoFechasRegistro($tabla, $fechaInicial, $fechaFinal);

    return $respuesta;
  } */

  /* =============================================
      INGRESO DE USUARIO
      ============================================= */

  static public function ctrIngresoUsuario()
  {

    if (isset($_POST["username"])) {

      if (
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["username"]) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["pass"])
      ) {

        $encriptar = crypt($_POST["pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

        $tabla = "habilidad";

        $item = "idobstetra";
        //$item = "nombre";
        $valor = $_POST["username"];
        //$valor = $_POST["YOSSHI SALVADOR CONDORI MENDIETA"];

        $respuesta = ModeloRegistro::mdlMostrarObstetraLogin($tabla, $item, $valor);

        if ($respuesta["idobstetra"] == $_POST["username"] && $respuesta["password"] == $encriptar) {


          $_SESSION["iniciarSesion"] = "ok";
          $_SESSION["idobstetra"] = $respuesta["idobstetra"];
          $_SESSION["dni"] = $respuesta["dni"];
          $_SESSION["email"] = $respuesta["email"];
          $_SESSION["fecha_colegiatura"] = $respuesta["fecha_colegiatura"];

          /* =============================================
            REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
          ============================================= */

          date_default_timezone_set('America/Bogota');

          $fecha = date('Y-m-d');
          $hora = date('H:i:s');

          $fechaActual = $fecha . ' ' . $hora;

          $item1 = "ultimo_login";
          $valor1 = $fechaActual;

          $item2 = "idhabilidad";
          $valor2 = $respuesta["idhabilidad"];

          $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

          if ($ultimoLogin == "ok") {

            echo '<script>
  
                       window.location = "inicio";
  
                    </script>';
          }
        } else {

          echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
        }
      }
    }
  }



  /* =============================================
      MOSTRAR OBSTETRA
      ============================================= */


  static public function ctrMostrarObstetra($item, $valor)
  {

    $tabla = "registro";

    $respuesta = ModeloRegistro::mdlMostrarObstetra($tabla, $item, $valor);

    return $respuesta;
  }


  /* =============================================
      MOSTRAR OBSTETRA INICIO
      ============================================= */


  static public function ctrMostrarObstetraInicio($item, $valor)
  {

    $tabla = "habilidad";

    $respuesta = ModeloRegistro::mdlMostrarObstetraInicio($tabla, $item, $valor);

    return $respuesta;
  }

  /* =============================================
      CREAR REGISTRO
   ============================================= */

  static public function ctrCrearRegistro()
  {

    if (isset($_POST["nuevCop"])) {

      if ($_POST["nuevCop"]) {


        $cop = $_POST["nuevCop"];
        $item = "cop";
        $tabla = "registro";
        $obstetra = ModeloRegistro::mdlMostrarObstetra($tabla, $item, $cop);
        $idobstetras = $obstetra["cop"];

        if ($obstetra == false) {

          echo '<script>
 
          swal({
              type: "error",
              title: "¡El N° ' . $cop . ' de Colegiatura no se encuentra registrado!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
              }).then((result) => {
              if (result.value) {

              window.location = "";

              }
            })

          </script>';
        } else {

          date_default_timezone_set('America/Lima');

          $fecha = date('Y-m-d');
          $hora = date('H:i:s');

          $fechaActual = $fecha . ' ' . $hora;

          $tabla = "habilidad";

          $dateformato = new DateTime($_POST["nuevaFechaColegiatura"]);
          $encriptar = crypt($_POST["nuevPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
          $datos = array(
            "idobstetra" => $idobstetras,
            "dni" => $_POST["dni"],
            "email" => $_POST["nuevEmail"],
            "password" => $encriptar,
            "fecha_colegiatura" => $dateformato->format('d/m/Y'),
            "fecha_registro" => $fechaActual
          );

          $respuesta = ModeloRegistro::mdlIngresarRegistro($tabla, $datos);

          if ($respuesta == "ok") {

            echo '<script>
                
                      swal({
                          type: "success",
                          title: "El Registro ha sido generado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then((result) => {
                              if (result.value) {
          
                              window.location = "registro-obstetra";
          
                              }
                            })
    
                </script>';
          } else {
            echo '<script>
                  
                        swal({
                            type: "success",
                            title: "Error con el insert",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then((result) => {
                                if (result.value) {

                                window.location = "registro-obstetra";

                                }
                              })

                </script>';
          }
        }
      } else {

        echo '<script>
 
           swal({
               type: "error",
               title: "¡Error al enviar el formulario!",
               showConfirmButton: true,
               confirmButtonText: "Cerrar"
               }).then((result) => {
               if (result.value) {
 
               window.location = "registro-obstetra";
 
               }
             })
 
           </script>';
      }
    }
  }

  /* =============================================
      EDITAR REGISTRO
      ============================================= */

  static public function ctrEditarRegistro()
  {

    if (isset($_POST["editarIdRegistro"])) {


      if ($_POST["editarIdRegistro"]) {
        /* =============================================
          VALIDAR IMAGEN
          ============================================= */

        $ruta = $_POST["imagenActual"];

        $nombreCarpeta = "0";

        if (isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])) {

          list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

          $nuevoAncho = 500;
          $nuevoAlto = 500;

          /* =============================================
              CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
          ============================================= */

          $directorio = "vistas/img/productos/" . $nombreCarpeta;

          /* =============================================
           PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
          ============================================= */

          if (!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/default/anonymous.png") {

            unlink($_POST["imagenActual"]);
          } else {

            mkdir($directorio, 0755);
          }

          /* =============================================
                                DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                                ============================================= */

          if ($_FILES["editarImagen"]["type"] == "image/jpeg") {

            /* =============================================
                                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                                    ============================================= */

            $aleatorio = mt_rand(100, 999);

            $ruta = "vistas/img/productos/" . $nombreCarpeta . "/" . $aleatorio . ".jpg";

            $origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagejpeg($destino, $ruta);
          }

          if ($_FILES["editarImagen"]["type"] == "image/png") {

            /* =============================================
                                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                                    ============================================= */

            $aleatorio = mt_rand(100, 999);

            $ruta = "vistas/img/productos/" . $nombreCarpeta . "/" . $aleatorio . ".png";

            $origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagepng($destino, $ruta);
          }
        }

        $tabla = "registro";

        $datos_completos = $_POST["editarApellidoPaterno"] . " " . $_POST["editarApellidoMaterno"] . " " . $_POST["editarNombre"];

        $datos = array(

          "cop" => $_POST["editarIdRegistro"],
          "apellido_paterno" => $_POST["editarApellidoPaterno"],
          "apellido_materno" => $_POST["editarApellidoMaterno"],
          "nombre" => $_POST["editarNombre"],
          "datos_completos" => $datos_completos,
          "colegio_regional" => $_POST["editarColegioRegional"],
          "estado" => $_POST["editarEstado"],
          "post_grado" => $_POST["editarPostGrado"],
          "imagen" => $ruta

        );



        $respuesta = ModeloRegistro::mdlEditarRegistro($tabla, $datos);

        if ($respuesta == "ok") {

          echo '<script>

						swal({
							  type: "success",
							  title: "El Registro ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then((result) => {
										if (result.value) {

										window.location = "registro";

										}
									})

						</script>';
        } else {
          echo '<script>

          swal({
              type: "success",
              title: "Error al Registrar la Visita, Contactar con el Administrador",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
              }).then((result) => {
                  if (result.value) {

                  window.location = "registro";

                  }
                })

          </script>';
        }
      } else {

        echo '<script>

					swal({
						  type: "error",
						  title: "¡El Registro no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then((result) => {
							if (result.value) {

							window.location = "registro";

							}
						})

			  	</script>';
      }
    }
  }

  /* =============================================
      BORRAR PRODUCTO
      ============================================= */

  static public function ctrEliminarRegistro()
  {

    if (isset($_GET["idRegistro"])) {

      $tabla = "registro";
      $datos = $_GET["idRegistro"];

      $respuesta = ModeloRegistro::mdlEliminarRegistro($tabla, $datos);

      if ($respuesta == "ok") {

        echo '<script>

				swal({
					  type: "success",
					  title: "El Registro ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "registro";

								}
							})

				</script>';
      }
    }
  }

  /* =============================================
      REPORTE EXCEL
      ============================================= */
  public function ctrDescargarReporte()
  {
    if (isset($_GET["reporte"])) {

      $tabla = "ticket";

      if (isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])) {

        $ticket = ModeloRegistro::mdlMostrarRegistroReporte($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"]);
      } else {

        $item = null;
        $valor = null;
        $ticket = ModeloRegistro::mdlMostrarRegistroReporte($tabla, $item, $valor);
      }


      /*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

      $Name = $_GET["reporte"] . '.xls';

      header('Expires: 0');
      header('Cache-control: private');
      header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
      header("Cache-Control: cache, must-revalidate");
      header('Content-Description: File Transfer');
      header('Last-Modified: ' . date('D, d M Y H:i:s'));
      header("Pragma: public");
      header('Content-Disposition:; filename="' . $Name . '"');
      header("Content-Transfer-Encoding: binary");

      echo utf8_decode("<table border='0'> 

      <tr>
      <td style='font-weight:bold; boder:1px solid #eee;'>Item</td> 
      <td style='font-weight:bold; boder:1px solid #eee;'>Estado de Visita</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Fecha</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Tipo de Documento</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Dni</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Nombre Paciente</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Edad del Paciente</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>DireccionDelPaciente</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Establecimiento de Salud</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Distrito Seleccionado</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Telefono</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>ComoAB</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Muestra</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Categoría</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Código</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Descripción del Problema</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>FechaSintomas</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Sintomas</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Enfermedad</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Tos</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>DolorGarganta</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Fiebre</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Fiebre Temperatura</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>SecrecionNasal</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>OtroSintomas</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Viaje</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Pais donde Viajo</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>NumeroViaje</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>ContactoPersonaSospechosa</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>DatosPersonaSospechosa</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>CelPersonaSospechosa</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>Digitador</td>
      </tr>");

      foreach ($ticket as $row => $item) {

        $distrito = ControladorDistrito::ctrMostrarDistrito("id", $item["id_distrito"]);
        $estado = ControladorEstado::ctrMostrarEstado("id", $item["id_estado"]);
        $tipodoc = ControladorDocumento::ctrMostrarDocumento("id", $item["id_documento"]);
        echo utf8_decode("<tr>

        <td style='border:1px solid #eee;'>" . ($row + 1) . "</td>             
        <td style='border:1px solid #eee;'>" . $estado["estado"] . "</td>            
                    <td style='border:1px solid #eee;'>" . $item["fecha"] . "</td>
                    <td style='border:1px solid #eee;'>" . $tipodoc["documento"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["dni"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["nombre_paciente"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["edad_paciente"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["direccion_paciente"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["distrito_paciente"] . "</td>
                    <td style='border:1px solid #eee;'>" . $distrito["distrito"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["telefono_paciente"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["comoAB_paciente"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["muestra_paciente"] . "</td>
                    
                    <td style='border:1px solid #eee;'>" . $item["codigo"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["descripcion_paciente"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["FechaSintomas"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["Sintomas"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["Enfermedad"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["Tos"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["DolorGarganta"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["Fiebre"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["fiebre_num"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["SecrecionNasal"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["OtroSintomas"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["Viaje"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["pais_viaje"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["NumeroViaje"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["ContactoPersonaSospechosa"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["DatosPersonaSospechosa"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["CelPersonaSospechosa"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["nombre"] . "</td>
       </tr>");
      }
      echo "</table>";
    }
  }
}
