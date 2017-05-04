<?php
session_start();

$mail = $_POST["email"];
$pass = password_hash($_POST["password"], PASSWORD_DEFAULT);

$usuarios = file_get_contents("json/usuarios.json");

$usuariosArray = explode(PHP_EOL, $usuarios);

array_pop($usuariosArray);

foreach ($usuariosArray as $key => $usuario) {
  $usuarioArray = json_decode($usuario, true);

  if ($mail == $usuariosArray["email"] && $pass == $usuariosArray["password"]) {
    header("location:index.php");
  }
  else {
    header("location:index.php?error=1");
  }
}


?>
