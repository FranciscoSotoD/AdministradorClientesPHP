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
            <?php
              $item = null;
              $valor = null;
              $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
              // var_dump($categorias); // Muestra en un array las categorias
              foreach($categorias as $key => $value ) {
                echo '
                <tr>
                  <td>'.($key + 1).'</td>
                  <td>'.$value["categoria"].'</td>
                  <td>'.$value["descripcion"].'</td>              
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-times"></i></button>
                    </div>
                  </td>              
                </tr>
                ';
              }
            ?>
            
          </tbody>
        </table>

      </div>

    </div> 

  </section> 

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
                <input type="text" class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" placeholder="Ingresar Categoría"
                  required>
              </div>
            </div>
            <!-- INPUT PARA LA DESCRIPCION -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-center"></i></span>
                <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar la Descripción"
                  required>
              </div>
            </div>                     

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success">Guardar Categoría</button>
        </div>

        <?php
          $crearCategoria = new ControladorCategorias();
          $crearCategoria -> ctrCrearCategoria();
        ?>

      </form>

    </div>

  </div>
</div>

<!-- MODAL PARA EDITAR CATEGORIA -->
<div id="modalEditarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post">

        <div class="modal-header" style="background:#3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Categoría</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">
            <!-- INPUT PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="editarCategoria" name="editarCategoria" required>
                <input type="hidden" id="idCategoria" name="idCategoria">
              </div>
            </div>
            <!-- INPUT PARA LA DESCRIPCION -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-center"></i></span>
                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" required>
              </div>
            </div>                     

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success">Guardar Cambios</button>
        </div>

        <?php
          $editarCategoria = new ControladorCategorias();
          $editarCategoria -> ctrEditarCategoria();
        ?>

      </form>

    </div>

  </div>
</div>

<?php
  $borrarCategoria = new ControladorCategorias();
  $borrarCategoria -> ctrBorrarCategoria();
?>