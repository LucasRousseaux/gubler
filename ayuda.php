<?php require('php/head.php');?>
<body>
  <!-- Barra de Navegación -->
  <?php require('php/nav.php') ?>
  <!-- Main -->
  <?php
  $jstring = file_get_contents("json/ayuda.json");
  $faq_array = json_decode($jstring,true);
  ?>
<main>
  <section class="home help">
    <div class="container">
      <div class="row">
        <div class="form-inicio">
          <div class="col-md-offset-2 col-md-8">
            <h2>¿Cómo podemos ayudarte? </h2>
          </div>
          <form class="formulario-home" action="" method="post">
            <div class="col-xs-offset-2 col-xs-8 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8">
              <input type="text" name="buscar" value="" placeholder="Haz una pregunta...">
              <input type="submit" name="Buscar" value="Buscar">
            </div>
            </form>
        </div>
      </div>
    </div>
      <div class="ayuda">
        <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <ul class="nav nav-pills nav-stacked">
                  <li role="presentation"><a href="#general">General</a></li>
                  <li role="presentation"><a href="#obtener">Obtener</a></li>
                  <li role="presentation"><a href="#proveer">Proveer</a></li>
                </ul>
              </div>
              <div class="col-xs-12 col-sm-8 col-md-offset-1 col-md-6">
               <div id="general">
                 <h3>Visión General</h3>
                 <?php
                 foreach ($faq_array["vision"] as $v) {
                   echo "<h4>".$v["pregunta"]."</h4>";
                   echo "<br>";
                   echo "<p>".$v["respuesta"]."</p>";
                   echo "<br>";
                 }
                 ?>
               </div>
               <div id="obtener">
                 <h3>Obtener Atención Médica</h3>
                   <?php
                   foreach ($faq_array["obtener"] as $v) {
                     echo "<h4>".$v["pregunta"]."</h4>";
                     echo "<br>";
                     echo "<p>".$v["respuesta"]."</p>";
                     echo "<br>";
                   }
                   ?>
               </div>
               <div id="proveer">
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
          </div>
    </section>
  </main>
  <?php require('php/footer.php') ?>
</body>
</html>
