<?php





$menu = [];

$nUsuario = "";
if (isset($_COOKIE["usuario"])) {
  $nUsuario = $_COOKIE["usuario"];
  $menu = [
    "Hola, " . $nUsuario => '#',
    "ofrecé tus servicios" => 'ofrece.php',
    "ayuda" => 'ayuda.php'
  ];
} else {
  $menu =  [
      "ofrecé tus servicios" => 'ofrece.php',
      "registrate" => 'registro.php',
      "iniciá sesión" => 'sesion.php',
      "ayuda" => 'ayuda.php'
  ];
}

// var_dump($_COOKIE)




$medico = [
  "medico-01" => ['img-01.jpg', 'Juan García', 'Internista'],
  "medico-03" => ['img-03.jpg', 'Antonella González', 'Pedriatría'],
  "medico-04" => ['img-02.jpg', 'Javier Rodriguez', 'Cirugía'],
];

?>
