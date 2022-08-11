<?php

class ControladorCategorias {

    // Agregar nueva categoria
    static public function ctrCrearCategoria() {

        if(isset($_POST["nuevaCategoria"])) {

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"]) ) {

                $tabla = "categorias";
                // $datos = $_POST["nuevaCategoria"];
                $datos = array("categoria" => $_POST["nuevaCategoria"],
                               "descripcion" => $_POST["nuevaDescripcion"] );

                $respuesta = ModeloCategorias::mdlAgregarCategoria($tabla, $datos);

                if($respuesta == "ok") {
                    echo '<script>
                            swal({
                                type: "success",
                                title: "La categoría ha sido guardado correctamente...",
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

            } else {
                echo '<script>

                swal({
                    type: "error",
                    title: "¡La categoría no puede ir vacío ni llevar caracteres especiales!, ingresa los datos correctamente",
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
    static public function ctrMostrarCategorias($item, $valor) {
        
        $tabla = "categorias";

        $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);

        return $respuesta;

    }

    // Editar Categorias
    static public function ctrEditarCategoria() {

        if(isset($_POST["editarCategoria"])) {

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"]) ) {

                $tabla = "categorias";
                // $datos = $_POST["nuevaCategoria"];
                $datos = array("id" => $_POST["idCategoria"],
                               "categoria" => $_POST["editarCategoria"],
                               "descripcion" => $_POST["editarDescripcion"] );

                $respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);

                if($respuesta == "ok") {
                    echo '<script>
                            swal({
                                type: "success",
                                title: "La categoría ha sido actualizada correctamente...",
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

            } else {
                echo '<script>

                swal({
                    type: "error",
                    title: "¡La categoría no puede ir vacío ni llevar caracteres especiales!, ingresa los datos correctamente",
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
    static public function ctrBorrarCategoria() {

        if(isset($_GET["idCategoria"])) {

            $tabla = "Categorias";
            $datos = $_GET["idCategoria"];

            $respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $datos);

            if($respuesta == "ok") {
                echo '<script>
                        swal({
                            type: "success",
                            title: "La categoría/plataforma ha sido eliminada correctamente...",
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

}