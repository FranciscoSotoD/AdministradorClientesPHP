<?php

class ControladorClientes {

    // Crear nuevo cliente
    static public function ctrCrearCliente() {
        
        if(isset($_POST["nuevoNombre"])) {
            
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
               preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoCorreo"]) &&
               preg_match('/^[0-9]+$/', $_POST["nuevoTelefono"]) &&
               preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoCategoria"]) ) {
                
                $tabla = "clientes";
                $datos = array("nombre" => $_POST["nuevoNombre"],
                               "correo" => $_POST["nuevoCorreo"],
                               "telefono" => $_POST["nuevoTelefono"],
                               "categoria" => $_POST["nuevoCategoria"],
                               "estado" => $_POST["nuevoEstado"],
                               "negocio" => $_POST["nuevoTipoNegocio"] );
                
                $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

                if($respuesta == "ok") {
                    echo '<script>
                            swal({
                                type: "success",
                                title: "El cliente ha sido guardado correctamente...",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                                }).then(function(result){
                                if (result.value) {

                                window.location = "usuarios";

                                }
                            })
                    </script>';
                }

                                
                
            } else {
                echo '<script>

                swal({
                    type: "error",
                    title: "¡El cliente no puede ir vacío ni llevar caracteres especiales!, ingresa los datos correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    }).then(function(result){
                      if (result.value) {

                      window.location = "usuarios";

                      }
                  })

			  	</script>';

                

            
            }

        }
    }

    // Mostrar Clientes
    static public function ctrMostrarClientes($item, $valor) {
        $tabla = "clientes";
        $respuesta = ModeloClientes::MdlMostrarClientes($tabla, $item, $valor);
        return $respuesta;
    }

    // Editar Cliente
    static public function ctrEditarCliente() {

        if(isset($_POST["editarNombre"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) ) {
            
                $tabla = "clientes";
                $datos = array("id" => $_POST["idDelCliente"],
                               "nombre" => $_POST["editarNombre"],
                               "correo" => $_POST["editarCorreo"],
                               "telefono" => $_POST["editarTelefono"],
                               "categoria" => $_POST["editarCategoria"],
                               "estado" => $_POST["editarEstado"],
                               "negocio" => $_POST["editarNegocio"] );
                
                $respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

                if($respuesta == "ok") {
                    echo '<script>
                            swal({
                                type: "success",
                                title: "El cliente ha sido actualizado correctamente...",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                                }).then(function(result){
                                if (result.value) {

                                window.location = "usuarios";

                                }
                            })
                    </script>';
                }

            } else {

                echo '<script>

                swal({
                    type: "error",
                    title: "¡El cliente no puede ir vacío ni llevar caracteres especiales!, ingresa los datos correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",                    
                    }).then(function(result){
                      if (result.value) {

                      window.location = "usuarios";

                      }
                  })

			  	</script>';
            }
        }
    }

    // Eliminar cliente
    static public function ctrEliminarCliente() {
        if(isset($_GET["idCliente"])) {
            $tabla = "clientes";
            $datos = $_GET["idCliente"];

            $respuesta = ModeloClientes::mdlElimiarCliente($tabla, $datos);

            if($respuesta == "ok") {
                echo '<script>
                            swal({
                                type: "success",
                                title: "El cliente ha sido eliminado correctamente...",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                                }).then(function(result){
                                if (result.value) {

                                    window.location = "usuarios";

                                }
                            })
                    </script>';
            }
        }
    }

}

