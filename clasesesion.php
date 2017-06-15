<?php
require('php/head.php');
require("cls/clsUsuario.php");


if (isset($_POST["sesion"])) {
  $recordar = $_POST["sesion"];
} else {
  $recordar = 0;
}

if($_POST) {
  $mail = $_POST["email"];
  $pass = sha1($_POST["password"]);
  $error = "";

if (\Gubler\Constante::SQL_ACCESS) {

  try {

    $dsn = 'mysql:host=localhost;dbname='.\Gubler\Constante::SCHEMA_NAME.';charset=utf8mb4;port:3306';
    $db_user = 'root';
    $db_pass = '';
    $db = new \PDO($dsn, $db_user, $db_pass);
    $usuario = new \Gubler\Usr\Usuario($db);

    $errores = array();

    if(!$usuario->validarPassword($pass)) {
      $errores[] = 'El password no es valido';
    }

    if(!$usuario->validarEmail($mail)) {
      $errores[] = 'El email no es valido';
    }


  } catch(PDOException  $e ) {
    $errores[] = "Error: ".$e;
  }

}

if(empty($errores)) {

  $resultado_logeo = $usuario->logeo($_POST);


  if(!empty($resultado_logeo)) {


    $_SESSION['nombre']=$resultado_logeo['nombre'];
    $_SESSION['email']=$resultado_logeo['email'];


    header('location:index.php');

    exit();
  }
}

}

?>
   <body>
    <!-- comienzo de barra de navegacion -->
    <?php require('php/nav.php'); ?>
    <!-- fin de barra de navegacion -->
    <!-- comienzo del main -->
    <main>
      <section class="home registro">
        <div class="container">

          <div class="col-md-offset-2 col-md-8">
            <h2>Iniciá sesión</h2>
          </div>

          <div class="row">

            <div class="registro">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="textoinicio2">
                  <p>Aún no tenés una cuenta </p><a href="#"> REGISTRATE</a>
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="check">
                  <a href="#">OLVIDÉ LA CONTRASEÑA</a><br>
                </div>
              </div>

              <div class="form-inicio">

                <form class="formulario-home" action="clasesesion.php" role="form" method="post">
                  <!-- He colocado cada input del formulario dentro de un div para incorporarle los anchos de bootstrap -->

                  <div class="col-xs-12 col-sm-9 col-sm-offset-2 col-sm-8">
                    <div class="col-xs-12 col-sm-offset-3 col-sm-4 col-md-6">
                      <?php if (!empty($errores)) { ?>
              				<div class="errores">
              					<ul>
              						<?php foreach ($errores as $error) { ?>
              							<li>
              								<?php echo $error ?>
              							</li>
              						<?php } ?>
              					</ul>
              				</div>
              			<?php } ?>

                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-6">
                      <input type="email" name="email" value="<?php isset($_COOKIE['email'])?$_COOKIE['email']:''?>" placeholder="Tu mail">
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-6">
                      <input type="password" name="password" value="" placeholder="Contraseña">
                    </div>

                    <div class="col-xs-12 col-sm-offset-3 col-sm-4 col-md-6">
                      <button type="submit" name="" value=""><i class="glyphicon glyphicon-ok" aria-hidden="true"></i></button>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-sm-offset-3 col-md-6">
                      <div class="recordarme">
                        <input type="checkbox" name="sesion" value="1">
                        <p>RECORDARME</p>
                      </div>
                    </div>

                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <?php require('php/footer.php');?>
  </body>
</html>
