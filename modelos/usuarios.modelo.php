<?php

require_once "conexion.php";

class ModeloUsuarios
{
    /* =============================================
      MOSTRAR USUARIOS
      ============================================= */

    static public function mdlMostrarUsuarios($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();
            //
            return $stmt->fetchAll();
        }


        $stmt->close();

        $stmt = null;
    }

    static public function mdlMostrarUusarioInformatico($tabla, $item, $item2, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item2=:$item2 ORDER BY id DESC");

            $stmt->bindParam(":" . $item2, $valor, PDO::PARAM_STR);

            $stmt->execute();
            //
            return $stmt->fetchAll();
        }


        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      REGISTRO DE USUARIO
      ============================================= */

    static public function mdlIngresarUsuario($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(dni,nombre,oficina,area,cargo,cel,sede,piso,usuario, password, perfil, foto) VALUES (:dni,:nombre,:oficina,:area,:cargo,:cel,:sede,:piso,:usuario, :password, :perfil, :foto)");

        $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":oficina", $datos["oficina"], PDO::PARAM_STR);
        $stmt->bindParam(":area", $datos["area"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":cel", $datos["cel"], PDO::PARAM_STR);
        $stmt->bindParam(":sede", $datos["sede"], PDO::PARAM_STR);
        $stmt->bindParam(":piso", $datos["piso"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      EDITAR USUARIO
      ============================================= */

    static public function mdlEditarUsuario($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET dni = :dni,nombre = :nombre,oficina= :oficina,area=:area,cargo=:cargo,cel=:cel,sede=:sede,piso=:piso, password = :password, perfil = :perfil, foto = :foto WHERE usuario = :usuario");

        $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":oficina", $datos["oficina"], PDO::PARAM_STR);
        $stmt->bindParam(":area", $datos["area"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":cel", $datos["cel"], PDO::PARAM_STR);
        $stmt->bindParam(":sede", $datos["sede"], PDO::PARAM_STR);
        $stmt->bindParam(":piso", $datos["piso"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      ACTUALIZAR USUARIO
      ============================================= */

    static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      BORRAR USUARIO
      ============================================= */

    static public function mdlBorrarUsuario($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
}
