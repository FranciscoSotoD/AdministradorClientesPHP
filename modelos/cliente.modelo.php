<?php

require_once "conexion.php";

class ModeloClientes {

    // Registrar/Agregar Cliente
    static public function mdlIngresarCliente($tabla, $datos) {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, correo, telefono, categoria, estado, negocio) VALUES (:nombre, :correo, :telefono, :categoria, :estado, :negocio)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":negocio", $datos["negocio"], PDO::PARAM_STR);

        if( $stmt->execute() ) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;

    }

    // Mostrar clientes
    static public function mdlMostrarClientes($tabla, $item, $valor) {
        if($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt -> execute();

            return $stmt -> fetchAll();
        }        

        $stmt -> close();

        $stmt = null;
    }

    // Editar Clientes
    static public function mdlEditarCliente($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, correo = :correo, telefono = :telefono, categoria = :categoria, estado = :estado, negocio = :negocio WHERE id = :id");

        $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);
        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt -> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
        $stmt -> bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt -> bindParam(":negocio", $datos["negocio"], PDO::PARAM_STR);

        if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}

		$stmt -> close();
		$stmt = null;
    }

    // Eliminar cliente
    static public function mdlElimiarCliente($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

        if($stmt -> execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt -> close();
        $stmt = null;
    }

}