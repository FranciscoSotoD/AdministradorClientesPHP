<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Administrar Negocios
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Negocios</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">Agregar Negocio</button>
      </div>

      <div class="box-body table-responsive">

        <table class="table table-bordered table-striped tabla">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Nombre</th>
              <th>Acciones</th>              
            </tr>
          </thead>
          <tbody>
            <?php
              $item = null;
              $valor = null;
              $negocios = ControladorNegocios::ctrMostrarNegocios($item, $valor);
              // var_dump($negocios); // Muestra en un array las negocios
              foreach($negocios as $key => $value ) {
                echo '
                <tr>
                  <td>'.($key + 1).'</td>
                  <td>'.$value["negocio"].'</td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning btnEditarNegocio" idNegocio="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarNeogcio"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger btnEliminarNegocio" idNegocio="'.$value["id"].'"><i class="fa fa-times"></i></button>
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

<!-- MODAL PARA AGREGAR NEGOCIO -->
<div id="modalAgregarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post">

        <div class="modal-header" style="background:#3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Negocio</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">
            <!-- INPUT PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="nuevoNegocio" name="nuevoNegocio" placeholder="Ingresar Negocio"
                  required>
              </div>
            </div>                                

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success">Guardar Negocio</button>
        </div>

        <?php
          $crearNegocio = new ControladorNegocios();
          $crearNegocio -> ctrCrearNegocio();
        ?>

      </form>

    </div>

  </div>
</div>

<!-- MODAL PARA EDITAR NEGOCIO -->
<div id="modalEditarNeogcio" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post">

        <div class="modal-header" style="background:#3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Negocio</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">
            <!-- INPUT PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="editarNegocio" name="editarNegocio" required>
                <input type="hidden" id="idNegocio" name="idNegocio">
              </div>
            </div>                                

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success">Guardar Cambios</button>
        </div>

        <?php
          $editarNegocio = new ControladorNegocios();
          $editarNegocio -> ctrEditarNegocio();
        ?>

      </form>

    </div>

  </div>
</div>

<?php
  $borrarNegocio = new ControladorNegocios();
  $borrarNegocio -> ctrBorrarNegocio();
?>