<?php

class ControladorAdministrador {

    static public function ctrIngresoAdministrador() {
        if(isset($_POST["ingUsuario"])) {
            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
		       preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {

                $tabla = "administrador";

                $item = "usuario";
                $valor = $_POST["ingUsuario"];

                $respuesta = ModeloAdministrador::MdlMostrarAdministrador($tabla, $item, $valor);

                if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"] ) {
                    // echo '<br><div class="alert alert-success">Bienvenido al sistema...</div>';
                    $_SESSION["iniciarSesion"] = "ok";
                    echo '<script>
                        window.location = "inicio";
                    </script>';

                } else {
                    echo '<br><div class="alert alert-danger">Usuario/Contraseña incorrecta...</div>';
                }

            }
        }
    }
}