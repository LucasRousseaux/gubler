<?php require('php/head.php'); ?>
  <body>
    <!-- comienzo de barra de navegacion -->
    <?php require('php/nav.php') ?>
    <!-- fin de barra de navegacion -->
    <script type="text/javascript" src="/js/script.js"></script>

    <!-- comienzo del main -->
    <main>
      <section class="home registro">
        <div class="container">
          <div class="row">
            <div class="col-md-offset-2 col-md-8">
              <h2>Registrate</h2>
            </div>
          </div>
          <div class="row">
            <div class="registro">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="textoinicio2">
                  <p>Ya tenés una cuenta </p><a href="sesion.php"> INICIÁ SESIÓN</a>
                </div>
             </div>
              <div class="form-inicio">
                <?php
                	require_once("php/funciones.php");
                	$pNombre = "";
                	$pMail = "";

                	if ($_POST) {

                		$pNombre = $_POST["nombre"];
                		$pMail = $_POST["email"];

                		$errores = validarUsuario($_POST);

                		if (empty($errores))
                		{

              			  $usuario = crearUsuario($_POST);
                			guardarUsuario($usuario);

                      $path = $_FILES['imgPerfil']['tmp_name'];
                      $ext = pathinfo($path, PATHINFO_EXTENSION);
                      $archivo = dirname(__FILE__) . '/images/usuarios/' . $_FILES['imgPerfil']['name'] . $ext;
                      $upload = move_uploaded_file($_FILES['imgPerfil']['tmp_name'], $archivo);

                      $_SESSION['nombre'] = $_POST["nombre"];
                      $_SESSION['email'] = $_POST["email"];

                    	// Reenviar a Index
	                    enviarAFelicidad();

                    }

                  }


                ?>
                <?php if (!empty($errores)) { ?>
        				<div id='errores' class="errores">
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
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <input type="text" name="nombre" id='nombre' value="<?php echo $pNombre; ?>" placeholder="Nombre">
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <input type="email" name="email" id='email' value="<?php echo $pMail; ?>" placeholder="Email">
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <input type="password" name="pass" id='pass' value="" placeholder="Contraseña">
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <input type="password" name="cpass" id='cpass' value="" placeholder="Confirmá tu contraseña">
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <label class="fileContainer">
                      <p><i class="fa fa-picture-o"></i> Cargar foto de perfil</p>
                      <input type="file" name="imgPerfil" value="">
                    </label>
                  </div>
                  <div class="row">
                    <div class="botonera">
                      <div class="col-xs-12 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                        <div class="col-xs-12 col-sm-6 col-md-offset-3 col-md-6">
                          <button type="submit" name="" value="" id="btn-submit"><i class="glyphicon glyphicon-ok" aria-hidden="true"></i></button>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-12">
                          <div class="textoinicio1">
                            <p>Conectarse con:</p>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                          </div>
                        </div>
                      </div>

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
