<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/administrador.controlador.php";
require_once "controladores/cliente.controlador.php";
require_once "controladores/negocio.controlador.php";

require_once "modelos/categorias.modelo.php";
require_once "modelos/administrador.modelo.php";
require_once "modelos/cliente.modelo.php";
require_once "modelos/negocio.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();

