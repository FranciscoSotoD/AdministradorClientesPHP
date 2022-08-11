// Editar Categoria 
$(".btnEditarNegocio").click(function(){
    var idNegocio = $(this).attr("idNegocio");

    var datos = new FormData();
    datos.append("idNegocio", idNegocio);

    $.ajax({
        url: "ajax/negocios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log("respuesta", respuesta);

            $("#idNegocio").val(respuesta["id"]);
            $("#editarNegocio").val(respuesta["negocio"]);
        }
    })
})

// Eliminar Categoria
$(".btnEliminarNegocio").click(function() {
    var idNegocio = $(this).attr("idNegocio");

    swal({
        title: '¿Está seguro de borrar el negocio?',
        text: 'Si no lo está, puede cancelar la acción',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, eliminar negocio'
    }).then((result)=> {

        if( result.value ) {
            window.location = "index.php?ruta=negocios&idNegocio="+idNegocio;
        }
    })
})

// Evitar categoria repetida
$("#nuevoNegocio").change(function() {

    $(".alert").remove();

    var negocio = $(this).val();

    var datos = new FormData();
    datos.append("validarNegocio", negocio);

    $.ajax({
        url: "ajax/negocios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            //console.log("respuesta", respuesta);
            if(respuesta) {
                $("#nuevoNegocio").parent().after('<div class="alert alert-warning">Este negocio ya existe...</div>');
                $("#nuevoNegocio").val("");
            }
        }
    })

})