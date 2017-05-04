<?php require('php/head.php');?>

  <body>
  <!-- Barra de Navegación -->
  <?php require('php/array.php');?>
  <?php require('php/nav.php') ?>

  <!-- Main -->
  <?php
  $jstring = file_get_contents("ayuda.json");
  $faq_array = json_decode($jstring,true);
  ?>



    <main>
      <section class="home help">
        <div class="container">
          <div class="row">
            <div class="col-md-offset-2 col-md-8">
              <h2>Requieres Ayuda?<br> Estas son las preguntas frecuentes. </h2>
            </div>
          </div>
          <div class="row">
            <div class="ayuda">
            <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8">
              <h3>Visión General</h3>
              <?php
              foreach ($faq_array["vision"] as $v) {
                echo "<h4>".$v["pregunta"]."</h4>";
                echo "<br>";
                echo "<p>".$v["respuesta"]."</p>";
                echo "<br>";
              }
              ?>
              <h3>Obtener Atención Médica</h3>

              <?php
              foreach ($faq_array["obtener"] as $v) {
                echo "<h4>".$v["pregunta"]."</h4>";
                echo "<br>";
                echo "<p>".$v["respuesta"]."</p>";
                echo "<br>";
              }
              ?>
              <h3>Proveer Atención Médica</h3>
              <?php
              foreach ($faq_array["proveer"] as $v) {
                echo "<h4>".$v["pregunta"]."</h4>";
                echo "<br>";
                echo "<p>".$v["respuesta"]."</p>";
                echo "<br>";
              }
              ?>

            </div>
          </div>
        </div>

      </section>

    </main>

<footer>
  <div class="legal">
    <p>Copyright (c) 2017 Copyright Holder All Rights Reserved.</p>
  </div>
</footer>

<!-- JavaScript para bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
