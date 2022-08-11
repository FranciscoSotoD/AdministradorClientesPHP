<?php

require_once "../controladores/negocio.controlador.php";
require_once "../modelos/negocio.modelo.php";

class AjaxNegocios {

    // Editar Categorias
    public $idNegocio;

    public function ajaxEditarNegocio() {

        $item = "id";
        $valor = $this->idNegocio;

        $respuesta = ControladorNegocios::ctrMostrarNegocios($item, $valor);

        echo json_encode($respuesta);

    }

    // Evitar categoria repetida
    public  $validarNegocio;

    public function ajaxValidarNegocio() {

        $item = "negocio";
        $valor = $this->validarNegocio;

        $respuesta = ControladorNegocios::ctrMostrarNegocios($item, $valor);

        echo json_encode($respuesta);

    }

}

// Editar Categoria 
if(isset($_POST["idNegocio"])) {
    $negocio = new AjaxNegocios();
    $negocio -> idNegocio = $_POST["idNegocio"];
    $negocio -> ajaxEditarNegocio();
}

// Evitar negocio repetido
if(isset($_POST["validarNegocio"])) {
    $valNegocio = new AjaxNegocios();
    $valNegocio -> validarNegocio = $_POST["validarNegocio"];
    $valNegocio -> ajaxValidarNegocio();
}