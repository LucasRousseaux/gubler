<?php require('php/head.php'); ?>
<?php require_once("php/funciones.php"); ?>

<?php


if ($_SESSION)
{

  $pNombre = "";
  $pMail = "";
  $pSexo = "";
  $pFechaNacimiento = "";
  $pNumeroTelefono = "";
  $pIdioma = "";
  $pLugarDondeVive = "";

  $pUsuario = $_SESSION["nombre"];
  $pMail = $_SESSION["email"];
  $idUsuario = buscarIdUsuario($pMail);
  $perfil = buscarPerfil($idUsuario);


  if ($_POST)
  {

    if ($perfil) {
      actualizarPerfil($_POST,$idUsuario);

    } else {
      agregarPerfil($_POST,$idUsuario);

    }

  }
  if ($perfil){
      $pSexo = $perfil["sexo"];
      $pFechaNacimiento = $perfil["fecha_de_nacimiento"];
      $pNumeroTelefono = $perfil["numero_de_telefono"];
      $pIdioma = $perfil["idioma"];
      $pLugarDondeVive = $perfil["lugar_donde_vive"];
  }

}

?>

  <body>
    <?php require('php/nav.php') ?>
    <main>

      <section class="home perfil altura">
        <div class="container">

          <div class="row">
            <div class="col-md-offset-2 col-md-8">
              <h1>Actualiza tu Perfil</h1>
            </div>
          </div>

          <div class="row">
            <div class="perfil">

              <div class="form-perfil">
                <form class="formulario-home" action="perfil.php" method="post" enctype="multipart/form-data">

                      <div class="col-xs-12 col-sm-4 col-md-6">
                        <input type="text" name="sexo" value="<?php echo $pSexo; ?>" placeholder="Sexo">
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-6">
                        <input type="text" name="fecha_de_nacimiento" value="<?php echo $pFechaNacimiento; ?>" placeholder="Fecha de Nacimiento">
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-6">
                        <input type="text" name="numero_de_telefono" value="<?php echo $pNumeroTelefono; ?>" placeholder="Numero de Telefono">
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-6">
                        <input type="text" name="idioma" value="<?php echo $pIdioma; ?>" placeholder="Idioma">
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-6">
                        <input type="text" name="lugar_donde_vive" value="<?php echo $pLugarDondeVive; ?>" placeholder="Lugar Donde Vive">
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-offset-3 col-md-6">
                        <button type="submit" name="Submit" value=""><i class="glyphicon glyphicon-ok"></i></button>
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
