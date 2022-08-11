<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias {

    // Editar Categorias
    public $idCategoria;

    public function ajaxEditarCategoria() {

        $item = "id";
        $valor = $this->idCategoria;

        $respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

        echo json_encode($respuesta);

    }

    // Evitar categoria repetida
    public  $validarCategoria;

    public function ajaxValidarCategoria() {

        $item = "categoria";
        $valor = $this->validarCategoria;

        $respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

        echo json_encode($respuesta);

    }

}

// Editar Categoria 
if(isset($_POST["idCategoria"])) {
    $categoria = new AjaxCategorias();
    $categoria -> idCategoria = $_POST["idCategoria"];
    $categoria -> ajaxEditarCategoria();
}

// Evitar categoria repetida
if(isset($_POST["validarCategoria"])) {
    $valCategoria = new AjaxCategorias();
    $valCategoria -> validarCategoria = $_POST["validarCategoria"];
    $valCategoria -> ajaxValidarCategoria();
}
