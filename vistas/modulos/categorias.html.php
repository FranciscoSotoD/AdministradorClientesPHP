<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Administrar Categorías
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Categorías</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">Agregar Categoría</button>
      </div>

      <div class="box-body table-responsive">

        <table class="table table-bordered table-striped tabla">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Nombre</th>
              <th>Descripcion</th>                            
              <th>Acciones</th>              
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Movilsa</td>
              <td>Las mejores recargas</td>              
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                </div>
              </td>              
            </tr>
          </tbody>
        </table>

      </div>

    </div> <!-- /.box-footer-->


  </section> <!-- /.content -->

</div>

<!-- MODAL PARA AGREGAR CATEGORIA -->
<div id="modalAgregarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post">

        <div class="modal-header" style="background:#3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Categoría</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">
            <!-- INPUT PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre"
                  required>
              </div>
            </div>
            <!-- INPUT PARA LA DESCRIPCION -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-center"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoDescripcion" placeholder="Ingresar la Descripción"
                  required>
              </div>
            </div>                     

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success">Guardar Categoría</button>
        </div>

      </form>

    </div>

  </div>
</div>