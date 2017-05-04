<?php

if ($_POST) {

$mail = $_POST["email"];
$pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
$usuarios = file_get_contents("./json/usuarios.json");
$usuariosArray = explode(PHP_EOL, $usuarios);
array_pop($usuariosArray);

foreach ($usuariosArray as $key => $usuario) {
  $usuarioArray = json_decode($usuario, true);

  if ($mail == $usuariosArray["email"] && $pass == $usuariosArray["password"]) {
    header("location:index.php");
  }
  else {
    header("location:sesion.php?error=1");
  }
}
}

require('php/head.php');?>

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
            <h3>La consulta médica que buscás, ahora al alcance de un click</h3>
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
                <form class="formulario-home" action="php/inicio-sesion.php" role="form" method="post">
                  <!-- He colocado cada input del formulario dentro de un div para incorporarle los anchos de bootstrap -->
                    <div class="col-xs-12 col-sm-4 col-sm-offset-3 col-md-6">
                      <input type="email" name="email" value="" placeholder="Tu mail">
                    </div>
                    <div class="col-xs-12 col-sm-4 col-sm-offset-3 col-md-6">
                      <input type="password" name="password" value="" placeholder="Contraseña">
                    </div>

                    <div class="col-xs-12 col-sm-4 col-sm-offset-3 col-md-6">
                      <button type="submit" name="" value=""><i class="glyphicon glyphicon-ok" aria-hidden="true"></i></button>
                    </div>
                    <div class="error-inicio">
                      <?php isset($_GET["error"]);
                      if ($_GET["error"] == 1) {
                        echo "<p>Usuario o contraseña inválida.</p>";
                      } ?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-sm-offset-3 col-md-6">
                      <div class="recordarme">
                        <input type="checkbox" name="sesion" value="1">
                        <p>RECORDARME</p>
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
