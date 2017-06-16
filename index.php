<?php require('php/head.php'); ?>
  <body>
    <!-- comienzo de barra de navegacion -->
    <?php require('php/nav.php') ?>
    <!-- fin de barra de navegacion -->
    <?php
    $saludo = "";
    if (isset($_SESSION["nombre"])) {
      $userName = $_SESSION["nombre"];
      $saludo = "Hola " . $userName . "<br><br>";

    };
     ?>
    <!-- comienzo del main -->
    <main>
      <section class="home altura">
        <div class="container">
          <h1><?php echo $saludo; ?>Bienvenido a <b>Gubler</b></h1>
          <h3>La consulta médica que buscás, ahora al alcance de un click</h3>
          <div class="row">
            <div class="">
              <div class="form-inicio">
                <form class="formulario-home" action="" method="post">
                  <!-- He colocado cada input del formulario dentro de un div para incorporarle los anchos de bootstrap -->
                  <div class="col-xs-12 col-sm-5 col-md-4">
                    <input type="text" name="medico" value="" placeholder="Especialista">
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-4">
                    <input type="text" name="localidad" value="" placeholder="Elegi tu localidad">
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-3">
                    <input type="text" name="fecha" value="" placeholder="Fecha">
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-1">
                    <button type="submit" name="" value=""><i class="fa fa-search"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </section>
      <!-- este div separardor lo usé para darle 10% de alto de separación entre seccion y seccion -->
      <div class="separador"></div>
      <section class="destacados">
        <div class="container">
          <div class="row">
            <h2>Destacados por especialidad</h2>
            <?php $medico = leerJson('json/usuarios.json');?>
            <?php foreach ($medico as $value) {
              $arrMedico = json_decode($value, true);
              $nombre = $arrMedico["nombre"];
              $urlDoctor = $arrMedico["imgPerfil"];
              $especialidad = $arrMedico["email"];


              $calificacion = rand(2,5);
              echo "<ul>";
              $estrellas = [];
              $estrellita = '<li><i class="fa fa-star activo"></i></li>';
              for ($i=0; $i <$calificacion ; $i++) {
                $estrellas[] = $estrellita;
              }
              echo "</ul>";

              $ranking = implode(" ", $estrellas);

              echo '
              <div class="col-sm-6 col-md-4">
                <article class="doctor">
                  <img src="images/usuarios/'.$urlDoctor  .'" alt="">
                  <div class="elementos-doctor">
                    <h3>'.$nombre.'</h3>
                    <p>'.$especialidad.'</p>
                    <ul>
                    '. $ranking . '

                    </ul>
                    <div class="locacion">
                      <i class="fa fa-map-marker"><h6>5k</h6></i>
                    </div>
                  </div>
                </article>
              </div>';
              };
             ?>
          </div>
          <div class="separador"></div>
          <div class="row">
            <h2>Destacados por localidad</h2>

          </div>

        </div>

      </section>
    </main>
    <!-- fin del main -->
    <?php require('php/footer.php');?>
    </body>
</html>
