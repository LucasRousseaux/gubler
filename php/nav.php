<header>
  <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Gubler</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav navbar-right">

<?php
         $nUsuario = "";
          if (isset($_SESSION["nombre"])) {
            $nUsuario = $_SESSION["nombre"];
          };

          if (isset($_COOKIE["usuario"])) {
            $nUsuario = $_COOKIE["usuario"];
          };

          if (isset($_SESSION["nombre"]) || isset($_COOKIE["usuario"])) {
            $menu = [
              "Hola, " . $nUsuario => '#',
              "Cerrar sesión" => 'index.php?session=1',
              "Ofrecé tus servicios" => 'ofrece.php',
              "Ayuda" => 'ayuda.php'
            ];
          }
          else {
            $menu = json_decode(file_get_contents('./json/menu.json'),true);

          };

          if(isset($_GET['session'])){
            if($_GET['session'] == 1){
              session_destroy();
              $menu = json_decode(file_get_contents('./json/menu.json'),true);
            }
          }
 ?>
          <?php foreach ($menu as $itemMenu => $link) { ?>
            <?php echo '<li><a href="'.$link.'">'. $itemMenu . '</a></li>'  ?>
          <?php } ?>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header>
