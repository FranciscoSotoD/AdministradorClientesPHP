// Editar Categoria 
$(".btnEditarCategoria").click(function(){
    var idCategoria = $(this).attr("idCategoria");

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({
        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log("respuesta", respuesta);

            $("#idCategoria").val(respuesta["id"]);
            $("#editarCategoria").val(respuesta["categoria"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
        }
    })
})

// Eliminar Categoria
$(".btnEliminarCategoria").click(function() {
    var idCategoria = $(this).attr("idCategoria");

    swal({
        title: '¿Está seguro de borrar la categoría/plataforma?',
        text: 'Si no lo está, puede cancelar la acción',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, eliminar categoría/plataforma'
    }).then((result)=> {

        if( result.value ) {
            window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;
        }
    })
})

// Evitar categoria repetida
$("#nuevaCategoria").change(function() {

    $(".alert").remove();

    var usuario = $(this).val();

    var datos = new FormData();
    datos.append("validarCategoria", usuario);

    $.ajax({
        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            //console.log("respuesta", respuesta);
            if(respuesta) {
                $("#nuevaCategoria").parent().after('<div class="alert alert-warning">Esta categoría ya existe...</div>');
                $("#nuevaCategoria").val("");
            }
        }
    })

})