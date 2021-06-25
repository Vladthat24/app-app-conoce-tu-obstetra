<?php

require_once "conexion.php";


/* =============================================
      MOSTRAR CONSULTA DE LA PAGINA DE CONSULTA.PHP
      ============================================= */
class ModeloRegistro
{

    /* =============================================
      MOSTRAR CONSULTA DE OBSTETRAS REGISTRADAS 
      EN LA BASE DE DATOS 
      CONOCE TU OBSTETRA
    ============================================= */

    static public function mdlMostrarObstetra($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY cop DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch();
        } else {
            echo "ERROR EN LA CONSULTA - CONTACTAR CON EL ADMINISTRADOR";
        }

        $stmt->close();

        $stmt = null;
    }


    /* =============================================
    MOSTRAR LOS DATOS DE HABILIDAD CODIGO Y FECHADERECUPERACION PARA 
    VALIDAD EL GET DEL ENLACE DE RECUPERAR CONTRASEÑA 
    ============================================= */

    static public function mdlMostrarObstetraCodigo($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY idhabilidad DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {
            echo "ERROR EN LA CONSULTA - CONTACTAR CON EL ADMINISTRADOR";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlRecuperarEmail($tabla, $item, $valor, $item2, $valor2)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item  and $item2=:$item2 ORDER BY idhabilidad DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch();
        } else {
            echo "ERROR EN LA CONSULTA - CONTACTAR CON EL ADMINISTRADOR";
        }

        $stmt->close();

        $stmt = null;
    }


    static public function mdlRecuperarPassword($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY idhabilidad DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch();
        } else {
            echo "ERROR EN LA CONSULTA - CONTACTAR CON EL ADMINISTRADOR";
        }

        $stmt->close();

        $stmt = null;
    }



    /* =============================================
      MOSTRAR CONSULTA DE OBSTETRAS UNA VEZ INICIAR SESSION
    ============================================= */

    static public function mdlMostrarObstetraInicio($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT LPAD(habilidad.idobstetra,5,'0') as cop,
            registro.nombre as nombre,
            concat(registro.apellido_paterno,' ',registro.apellido_materno) as apellidos,
            habilidad.fecha_colegiatura as fecha_colegiatura,LPAD(habilidad.cobhabilidad,7,'0') as cobhabilidad
            FROM $tabla
            inner join registro 
            on habilidad.idobstetra=registro.cop WHERE $item = :$item ORDER BY cop DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch();
        } else {
            echo "ERROR EN LA CONSULTA - CONTACTAR CON EL ADMINISTRADOR";
        }

        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      MOSTRAR IDPARA EL INICIO DE SESSION
    ============================================= */

    static public function mdlMostrarObstetraLogin($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT idhabilidad,idobstetra,dni,email,password,fecha_colegiatura,fecha_registro,estadologin,cobhabilidad FROM $tabla WHERE $item = :$item ORDER BY idhabilidad DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch();
        } else {
            echo "ERROR EN LA CONSULTA - CONTACTAR CON EL ADMINISTRADOR";
        }

        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      REGISTRO DE HABILIDAD
      ============================================= */

    static public function mdlIngresarRegistro($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idobstetra,
		dni,email,password,
		fecha_colegiatura,fecha_registro)
        VALUES (:idobstetra,:dni,
		:email,:password,
		:fecha_colegiatura,:fecha_registro)");

        $stmt->bindParam(":idobstetra", $datos["idobstetra"], PDO::PARAM_INT);
        $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_colegiatura", $datos["fecha_colegiatura"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      EDITAR HABILIDAD
      ============================================= */

    static public function mdlEditarRegistro($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET apellido_paterno=:apellido_paterno,
		apellido_materno=:apellido_materno,nombre=:nombre,
		datos_completos=:datos_completos,colegio_regional=:colegio_regional,
		estado=:estado,post_grado=:post_grado,imagen=:imagen WHERE cop = :cop");

        $stmt->bindParam(":cop", $datos["cop"], PDO::PARAM_INT);
        $stmt->bindParam(":apellido_paterno", $datos["apellido_paterno"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido_materno", $datos["apellido_materno"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":datos_completos", $datos["datos_completos"], PDO::PARAM_STR);
        $stmt->bindParam(":colegio_regional", $datos["colegio_regional"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":post_grado", $datos["post_grado"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      EDITAR HABILIDAD
      ============================================= */

    static public function mdlEditarCodeFecRecp($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo=:codigo,
          fecharecuperacion=:fecharecuperacion WHERE email = :email");

        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":fecharecuperacion", $datos["fecharecuperacion"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      BORRAR HABILIDAD
      ============================================= */

    static public function mdlEliminarRegistro($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE cop = :cop");

        $stmt->bindParam(":cop", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      ACTUALIZAR HABILIDAD
      ============================================= */

    static public function mdlActualizarRegistro($tabla, $item1, $valor1, $valor)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":id", $valor, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
}
