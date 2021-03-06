<?php require('php/head.php');
require_once("php/funciones.php");

$error = "";

if ($_POST) {

  $mail = $_POST["email"];
  $pass = sha1($_POST["password"]);

  if (isset($_POST["sesion"])) {
    $recordar = $_POST["sesion"];
  } else {
    $recordar = 0;
  }

  $usuarios = file_get_contents("./json/usuarios.json");
  $miUsuario = explode(PHP_EOL, $usuarios);

  $existe = false;

  foreach ($miUsuario as $key => $usuario) {
    $user = json_decode($usuario, true);

    if ($pass == $user['password'] && $mail == $user['email']) {
      $_SESSION['nombre'] = $user['nombre'];
      $_SESSION['email'] = $user['email'];
      $existe = true;

      if ($recordar == 1) {
        setcookie('usuario', $user['nombre'], time() + 300);
        setcookie('email', $user['email'], time() + 300);
      }
    }
  }
  print_r($existe);

  if ($existe) {
    header("location:index.php");
  }  else  {
    $error = "Usuario y contraseña incorrectos";
  }

}
?>
   <body>
    <!-- comienzo de barra de navegacion -->
    <?php require('php/nav.php') ?>
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
                <form class="formulario-home" action="sesion.php" role="form" method="post">
                  <!-- He colocado cada input del formulario dentro de un div para incorporarle los anchos de bootstrap -->

                  <div class="col-xs-12 col-sm-9 col-sm-offset-2 col-sm-8">
                    <div class="col-xs-12 col-sm-offset-3 col-sm-4 col-md-6">
                      <div class="error">
                        <h3><?php echo $error; ?></h3>
                      </div>

                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-6">
                      <input type="email" name="email" value="<?=isset($_COOKIE['email'])?$_COOKIE['email']:''?>" placeholder="Tu mail">
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
      <!-- este div separardor lo usé para darle 10% de alto de separación entre seccion y seccion -->

    </main>
    <?php require('php/footer.php') ?>
  </body>
</html>
