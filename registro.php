<?php require('php/head.php'); ?>
  <body>
    <!-- comienzo de barra de navegacion -->
    <?php require('php/nav.php') ?>
    <!-- fin de barra de navegacion -->

    <!-- comienzo del main -->
    <main>
      <section class="home registro">
        <div class="container">
          <div class="row">
            <div class="col-md-offset-2 col-md-8">
              <h2>Registrate</h2>
              <h3>La consulta médica que buscás, ahora al alcance de un click</h3>
            </div>
          </div>
          <div class="row">
            <div class="registro">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="textoinicio2">
                  <p>Ya tenés una cuenta </p><a href="#"> INICIÁ SESIÓN</a>
                </div>
             </div>
              <div class="form-inicio">
                <?php
                	require_once("php/funciones.php");
                	$pNombre = "";
                	$pMail = "";

                	if ($_POST)
                	{
                		$pNombre = $_POST["nombre"];
                		$pMail = $_POST["email"];
                		//Acá vengo si me enviaron el form

                		//Validar
                		$errores = validarUsuario($_POST);

                		// Si no hay errores....
                		if (empty($errores))
                		{
                			$usuario = crearUsuario($_POST);
                			// Guardar al usuario en un JSON
                			guardarUsuario($usuario);

                      $archivo = dirname(__FILE__) . 'images/usuarios/' . $_FILES['imgPerfil']['name'] . '.' . $ext;
                      $upload = move_uploaded_file($_FILES['imgPerfil']['tmp_name'], $archivo);

                  		setcookie("usuario", $pNombre, time() + 3600);

                    	// Reenviarlo a la felicidad
	                     enviarAFelicidad();

                    }

                  }


                ?>
                <?php if (!empty($errores)) { ?>
        				<div clas="errores">
        					<ul>
        						<?php foreach ($errores as $error) { ?>
        							<li>
        								<?php echo $error ?>
        							</li>
        						<?php } ?>
        					</ul>
        				</div>
        			<?php } ?>
                <form class="formulario-home" action="registro.php" method="post" enctype="multipart/form-data">
                  <!-- He colocado cada input del formulario dentro de un div para incorporarle los anchos de bootstrap -->
                  <div class="col-xs-12 col-sm-4 col-md-6">
                    <input type="text" name="nombre" value="<?php echo $pNombre; ?>" placeholder="Nombre">
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-6">
                    <input type="email" name="email" value="<?php echo $pMail; ?>" placeholder="Email">
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-6">
                    <input type="password" name="pass" value="" placeholder="Contraseña">
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-6">
                    <input type="password" name="cpass" value="" placeholder="Confirmá tu contraseña">
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-6">
                    <input type="file" name="imgPerfil" value="">
                  </div>

                  <div class="col-xs-12 col-sm-4 col-md-offset-3 col-md-6">
                    <button type="submit" name="" value=""><i class="glyphicon glyphicon-ok" aria-hidden="true"></i></button>
                  </div>

                  <div class="col-xs-12 col-sm-4 col-md-12">
                    <div class="textoinicio1">
                      <p>Conectarse con:</p>
                      <a href="#"><i class="fa fa-facebook"></i></a>
                      <a href="#"><i class="fa fa-google-plus"></i></a>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>

        </div>
      </section>
    <?php require('php/footer.php') ?>
  </body>
</html>
