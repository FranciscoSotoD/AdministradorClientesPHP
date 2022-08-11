<?php

require_once "../controladores/cliente.controlador.php";
require_once "../modelos/cliente.modelo.php";

class AjaxClientes {

    // Editar Cliente
    public $idCliente;

    public function ajaxEditarCliente() {

        $item = "id";
        $valor = $this -> idCliente;
        $respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

        echo json_encode($respuesta);

    }

}

// Editar Cliente

if(isset($_POST["idCliente"])) {
    $editar = new AjaxClientes();
    $editar -> idCliente = $_POST["idCliente"];
    $editar -> ajaxEditarCliente();
}