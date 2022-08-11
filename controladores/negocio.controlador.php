<?php

class ControladorNegocios {

    // Agregar nueva categoria
    static public function ctrCrearNegocio() {

        if(isset($_POST["nuevoNegocio"])) {

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNegocio"]) ) {

                $tabla = "negocios";
                $datos = array("negocio" => $_POST["nuevoNegocio"] );

                $respuesta = ModeloNegocios::mdlAgregarNegocio($tabla, $datos);

                if($respuesta == "ok") {
                    echo '<script>
                            swal({
                                type: "success",
                                title: "El negocio ha sido guardado correctamente...",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                                }).then(function(result){
                                if (result.value) {

                                window.location = "negocios";

                                }
                            })
                    </script>';
                }

            } else {
                echo '<script>

                swal({
                    type: "error",
                    title: "¡El negocio no puede ir vacío ni llevar caracteres especiales!, ingresa los datos correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    }).then(function(result){
                      if (result.value) {

                      window.location = "categorias";

                      }
                  })

			  	</script>';
            }

        }
    }

    // Mostrar Categorias
    static public function ctrMostrarNegocios($item, $valor) {
        
        $tabla = "negocios";

        $respuesta = ModeloNegocios::mdlMostrarNegocios($tabla, $item, $valor);

        return $respuesta;

    }

    // Editar Categorias
    static public function ctrEditarNegocio() {

        if(isset($_POST["editarNegocio"])) {

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNegocio"]) ) {

                $tabla = "negocios";
                $datos = array("id" => $_POST["idNegocio"],
                               "negocio" => $_POST["editarNegocio"] );

                $respuesta = ModeloNegocios::mdlEditarNegocio($tabla, $datos);

                if($respuesta == "ok") {
                    echo '<script>
                            swal({
                                type: "success",
                                title: "El negocio ha sido actualizado correctamente...",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                                }).then(function(result){
                                if (result.value) {

                                window.location = "negocios";

                                }
                            })
                    </script>';
                }

            } else {
                echo '<script>

                swal({
                    type: "error",
                    title: "¡El negocio no puede ir vacío ni llevar caracteres especiales!, ingresa los datos correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    }).then(function(result){
                      if (result.value) {

                      window.location = "categorias";

                      }
                  })

			  	</script>';
            }

        }
    }

    // Eliminar categoría/plataforma
    static public function ctrBorrarNegocio() {

        if(isset($_GET["idNegocio"])) {

            $tabla = "negocios";
            $datos = $_GET["idNegocio"];

            $respuesta = ModeloNegocios::mdlBorrarNegocio($tabla, $datos);

            if($respuesta == "ok") {
                echo '<script>
                        swal({
                            type: "success",
                            title: "El negocio ha sido eliminado correctamente...",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                            }).then(function(result){
                            if (result.value) {

                            window.location = "negocios";

                            }
                        })
                </script>';
            }
            
        }
    }

}