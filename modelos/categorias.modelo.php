<?php

require_once "conexion.php";

class ModeloCategorias {

    // Agregar nueva categoria
    static public function mdlAgregarCategoria($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria, descripcion) values (:categoria, :descripcion)");

        // $stmt -> bindParam(":categoria", $datos, PDO::PARAM_STR);

        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

        if($stmt -> execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt -> close();
        $stmt = null;
    }

    // Mostrar Categorias
    static public function mdlMostrarCategorias($tabla, $item, $valor) {

        if($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

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

    // Editar categoria
    static public function mdlEditarCategoria($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria, descripcion = :descripcion WHERE id = :id");

        // $stmt -> bindParam(":categoria", $datos, PDO::PARAM_STR);

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

        if($stmt -> execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt -> close();
        $stmt = null;
    }

    // Eliminar Categoría
    static public function mdlBorrarCategoria($tabla, $datos) {

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