<?php
require("cls/clsUsuario.php");
if (\Gubler\Constante::SQL_ACCESS) {
  try {
      $dsn = 'mysql:host=localhost;dbname='.\Gubler\Constante::SCHEMA_NAME.';charset=utf8mb4;port:3306';
      $db_user = 'root';
      $db_pass = '';
      $db = new \PDO($dsn, $db_user, $db_pass);
      $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    } catch(PDOException  $e ) {
        $errores[] = "Error: ".$e;
    }

}
?>
