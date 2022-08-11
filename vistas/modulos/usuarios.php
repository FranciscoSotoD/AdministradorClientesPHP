<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Administrar Clientes
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Clientes</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Usuario</button>


      </div>

      <div class="box-body table-responsive">

        <table class="table table-bordered table-striped tabla">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Teléfono</th>              
              <th>Plataforma</th>              
              <th>Estado</th>              
              <th>Tipo de Negocio</th>              
              <th>Fecha de Registro</th>
              <th>Acciones</th>              
            </tr>
          </thead>
          <tbody>
            <?php
              $item = null;
              $valor = null;
              $usuarios = ControladorClientes::ctrMostrarClientes($item, $valor);
              foreach($usuarios as $key => $value) {
                // var_dump($value["nombre"]);
                echo '
                  <tr>
                    <td>'.($key + 1).'</td>
                    <td>'.$value["nombre"].'</td>
                    <td>'.$value["correo"].'</td>
                    <td>'.$value["telefono"].'</td>
                    <td>'.$value["categoria"].'</td>
                    <td>'.$value["estado"].'</td>
                    <td>'.$value["negocio"].'</td>
                    <td>'.$value["fecha_registro"].'</td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-warning btnEditarCliente" idCliente="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCliente"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"><i class="fa fa-times"></i></button>
                      </div>
                    </td>              
                  </tr>
                ';
              }
            ?>             
          </tbody>
        </table>

      </div>

    </div> <!-- /.box-footer-->


  </section> <!-- /.content -->

</div>


<!-- MODAL PARA AGREGAR CLIENTE -->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post">

        <div class="modal-header" style="background:#3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Cliente</h4>
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
            <!-- INPUT PARA EL CORREO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoCorreo" placeholder="Ingresar Correo"
                  required>
              </div>
            </div>
            <!-- INPUT PARA EL TELEFONO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar Teléfono"
                  required>
              </div>
            </div>            
            <!-- INPUT PARA LA PLATAFORMA -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-center"></i> Perfil</span>
                <select class="form-control input-lg" name="nuevoCategoria">
                  <option value="">Seleccionar Plataforma</option>
                  <?php 
                    $item = null;
                    $valor = null;
                    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                    //var_dump($categorias);
                    foreach($categorias as $key => $value ) {
                      echo '
                      <option value="'.$value["categoria"].'">'.$value["categoria"].'</option>                  
                      ';
                    }
                  ?>
                </select>
                
              </div>
            </div>         
            <!-- INPUT PARA EL ESTADO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map"></i> Estado</span>
                <select class="form-control input-lg" name="nuevoEstado">
                  <option value="">Seleccionar Estado</option>
                  <option value="Aguascalientes">Aguascalientes</option>
                  <option value="Baja California">Baja California</option>
                  <option value="Baja California Sur">Baja California Sur</option>
                  <option value="Campeche">Campeche</option>
                  <option value="Chiapas">Chiapas</option>
                  <option value="Chihuahua">Chihuahua</option>
                  <option value="Ciudad de Mexico CDMX">Ciudad de Mexico/CDMX</option>
                  <option value="Estado de México">Estado de Mexico</option>
                  <option value="Guanajuato">Guanajuato</option>
                  <option value="Guerrero">Guerrero</option>
                  <option value="Hidalgo">Hidalgo</option>
                  <option value="Jalisco">Jalisco</option>
                  <option value="Michoacan">Michoacan</option>
                  <option value="Morelos">Morelos</option>
                  <option value="Nayarit">Nayarit</option>
                  <option value="Oaxaca">Oaxaca</option>
                  <option value="Puebla">Puebla</option>
                  <option value="Queretaro">Queretaro</option>
                  <option value="Quintana Roo">Quintana Roo</option>
                  <option value="San Luis Potosi">San Luis Potosi</option>
                  <option value="Sinaloa">Sinaloa</option>
                  <option value="Tabasco">Tabasco</option>
                  <option value="Tamaulipas">Tamaulipas</option>
                  <option value="Tlaxcala">Tlaxcala</option>
                  <option value="Veracruz">Veracruz</option>
                  <option value="Zacatecas">Zacatecas</option>
                </select>            
              </div>
            </div>         
                    
            <!-- INPUT PARA EL TIPO DE NEGOCIO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-center"></i> Negocio</span>
                <select class="form-control input-lg" name="nuevoNegocio">
                  <option value="">Seleccionar Negocio</option>
                  <?php 
                    $item = null;
                    $valor = null;
                    $negocios = ControladorNegocios::ctrMostrarNegocios($item, $valor);
                    //var_dump($categorias);
                    foreach($negocios as $key => $value ) {
                      echo '
                      <option value="'.$value["negocio"].'">'.$value["negocio"].'</option>                  
                      ';
                    }
                  ?>
                </select>                
              </div>
            </div>  

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success">Guardar Cliente</button>
        </div>

        <?php
          $crearCliente = new ControladorClientes();
          $crearCliente -> ctrCrearCliente();
        ?>

      </form>

    </div>

  </div>
</div>

<!-- MODAL PARA EDITAR CLIENTE -->
<div id="modalEditarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog"> 

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post">

        <div class="modal-header" style="background:#3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Cliente</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">
            <!-- INPUT PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i> Editar Nombre</span>
                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
                <input type="hidden" id="idDelCliente" name="idDelCliente" required>
              </div>
            </div>
            <!-- INPUT PARA EL CORREO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i> Editar Email</span>
                <input type="text" class="form-control input-lg" id="editarCorreo" name="editarCorreo" value="" required>
              </div>
            </div>
            <!-- INPUT PARA EL TELEFONO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i> Editar Teléfono</span>
                <input type="text" class="form-control input-lg" id="editarTelefono" name="editarTelefono" value="" required>
              </div>
            </div>            
            <!-- INPUT PARA LA PLATAFORMA -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-center"></i> Editar Categoría</span>
                <select class="form-control input-lg" name="editarCategoria">
                  <option value="" id="editarCategoria"></option>
                  <?php 
                    $item = null;
                    $valor = null;
                    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                    //var_dump($categorias);
                    foreach($categorias as $key => $value ) {
                      echo '
                      <option value="'.$value["categoria"].'">'.$value["categoria"].'</option>                  
                      ';
                    }
                  ?>
                </select>
              </div>
            </div> 
            <!-- INPUT PARA EL ESTADO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map"></i> Editar Estado</span>
                <select class="form-control input-lg" name="editarEstado">
                  <option value="" id="editarEstado"></option>
                  <option value="Aguascalientes">Aguascalientes</option>
                  <option value="Baja California">Baja California</option>
                  <option value="Baja California Sur">Baja California Sur</option>
                  <option value="Campeche">Campeche</option>
                  <option value="Chiapas">Chiapas</option>
                  <option value="Chihuahua">Chihuahua</option>
                  <option value="Ciudad de Mexico CDMX">Ciudad de Mexico/CDMX</option>
                  <option value="Estado de México">Estado de Mexico</option>
                  <option value="Guanajuato">Guanajuato</option>
                  <option value="Guerrero">Guerrero</option>
                  <option value="Hidalgo">Hidalgo</option>
                  <option value="Jalisco">Jalisco</option>
                  <option value="Michoacan">Michoacan</option>
                  <option value="Morelos">Morelos</option>
                  <option value="Nayarit">Nayarit</option>
                  <option value="Oaxaca">Oaxaca</option>
                  <option value="Puebla">Puebla</option>
                  <option value="Queretaro">Queretaro</option>
                  <option value="Quintana Roo">Quintana Roo</option>
                  <option value="San Luis Potosi">San Luis Potosi</option>
                  <option value="Sinaloa">Sinaloa</option>
                  <option value="Tabasco">Tabasco</option>
                  <option value="Tamaulipas">Tamaulipas</option>
                  <option value="Tlaxcala">Tlaxcala</option>
                  <option value="Veracruz">Veracruz</option>
                  <option value="Zacatecas">Zacatecas</option>
                </select>
                </select>
              </div>
            </div> 
            
            <!-- INPUT PARA EL TIPO DE NEGOCIO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-center"></i> Editar Negocio</span>
                <select class="form-control input-lg" name="editarNegocio">
                  <option value="" id="editarNegocio"></option>
                  <?php 
                    $item = null;
                    $valor = null;
                    $negocios = ControladorNegocios::ctrMostrarNegocios($item, $valor);
                    //var_dump($categorias);
                    foreach($negocios as $key => $value ) {
                      echo '
                      <option value="'.$value["negocio"].'">'.$value["negocio"].'</option>                  
                      ';
                    }
                  ?>
                </select>
              </div>
            </div> 
            

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success">Guardar Cambios</button>
        </div>

        <?php
          $editarCliente = new ControladorClientes();
          $editarCliente -> ctrEditarCliente();
        ?>

      </form>

    </div>

  </div>
</div>

<?php 
  $borrarCliente = new ControladorClientes();
  $borrarCliente -> ctrEliminarCliente();
?>