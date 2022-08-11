
<?php

    $item = null;
    $valor = null;

    $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
    //var_dump($clientes);
    $totalClientes = count($clientes);

    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
    //var_dump($categorias);
    $totalCategorias = count($categorias);

    $negocios = ControladorNegocios::ctrMostrarNegocios($item, $valor);
    //var_dump($negocios);
    $totalNegocios = count($negocios);

?>

<div class="col-lg-6 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
        <div class="inner">
            <h3><?php echo number_format($totalClientes); ?></h3>

            <p>Total de Clientes</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="usuarios" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<div class="col-lg-6 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
        <div class="inner">
            <h3><?php echo number_format($totalCategorias); ?></h3>

            <p>Total de Categorías</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="categorias" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<div class="col-lg-6 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
        <div class="inner">
            <h3><?php echo number_format($totalNegocios); ?></h3>

            <p>Total de Negocios</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="negocios" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
