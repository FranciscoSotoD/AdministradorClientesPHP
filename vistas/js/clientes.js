// Editar Cliente
//$(".btnEditarCliente").click(function(){
$('.tabla').on("click", ".btnEditarCliente", function() {
    var idCliente = $(this).attr("idCliente");
    console.log("idCliente: ", idCliente);

    var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({
        url: "ajax/clientes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log( "respuesta" ,respuesta);
            $("#idDelCliente").val(respuesta["id"]);
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarCorreo").val(respuesta["correo"]);
            $("#editarTelefono").val(respuesta["telefono"]); 
            $("#editarCategoria").html(respuesta["categoria"]);
            $("#editarCategoria").val(respuesta["categoria"]);
            $("#editarEstado").html(respuesta["estado"]);
            $("#editarEstado").val(respuesta["estado"]);
            $("#editarNegocio").html(respuesta["negocio"]);
            $("#editarNegocio").val(respuesta["negocio"]);
        }
    });
})

// Eliminar usuario
$(".btnEliminarCliente").click(function() {

    var idCliente = $(this).attr("idCliente");

    swal({
        title: '¿Está seguro de eliminar el cliente?',
        text: 'Si no lo está, puede cancelar',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminar cliente'
    }).then((result)=>{
        if(result.value) {
            window.location = "index.php?ruta=usuarios&idCliente="+idCliente+" ";
        }
    })
})