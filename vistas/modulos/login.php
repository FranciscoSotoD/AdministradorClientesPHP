<div class="login-box">

    <div class="login-logo">

        <img src="vistas/img/plantilla/logoMini.png" class="img-center" style="width: 300px">

    </div>

    <div class="login-box-body">

        <p class="login-box-msg">Ingresar al sistema</p>

        <form method="post">

            <div class="form-group has-feedback">

                <a>Nombre de usuario</a>
                <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>

            </div>

            <div class="form-group has-feedback">

                <a>Contraseña</a>
                <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            </div>

            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                </div>
            </div>

            <?php
                $login = new ControladorAdministrador();
                $login -> ctrIngresoAdministrador();
            ?>

        </form>

    </div>

</div>